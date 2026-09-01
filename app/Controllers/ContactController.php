<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ContactController extends BaseController
{
    public function procedureCategories()
    {
        $keyword = trim((string) $this->request->getGet('q'));
        $baseUrl = rtrim((string) env('api.procedureURL', 'https://crm.akclinics.com/book-appointment'), '/');
        $url     = $baseUrl . '/procedure-categories';

        if ($keyword !== '') {
            $url .= '?q=' . rawurlencode($keyword);
        }

        try {
            $response = Services::curlrequest()->get($url, [
                'headers' => ['Accept' => 'application/json'],
                'http_errors' => false,
                'timeout' => 10,
            ]);

            $payload = json_decode($response->getBody(), true);
            $items   = [];

            foreach (($payload['results'] ?? []) as $item) {
                $name = trim((string) ($item['text'] ?? $item['name'] ?? ''));

                if ($name !== '') {
                    $items[] = [
                        'id'   => (string) ($item['id'] ?? $name),
                        'name' => $name,
                    ];
                }
            }

            return $this->response->setJSON([
                'status' => true,
                'data'   => ['procedure_categories' => $items],
            ]);
        } catch (\Throwable $e) {
            $this->ihtLog('PROCEDURE LIST FAILED: ' . $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => 'Unable to load procedures right now.',
                'data'    => ['procedure_categories' => []],
            ]);
        }
    }

    public function submit()
    {
        $data = $this->request->getJSON(true);
        if (! is_array($data)) {
            $data = $this->request->getPost();
        }

        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[A-Za-z ]+$/]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
            ],
            'phone' => [
                'label' => 'Phone',
                'rules' => 'required|regex_match[/^[6-9][0-9]{9}$/]',
            ],
            'city' => [
                'label' => 'City',
                'rules' => 'required',
            ],
            'concern' => [
                'label' => 'Procedure',
                'rules' => 'required',
            ],
           
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please fill in all required fields with valid information.',
                    'errors'  => $this->validator->getErrors(),
                ]);
        }

        try {
        $message = trim((string) ($data['message'] ?? ''));
        $concern = trim((string) ($data['concern'] ?? ''));
        $procedureName = trim((string) ($data['procedure_name'] ?? ''));
        $procedureIdRaw = trim((string) ($data['procedure_category_id'] ?? ''));
        $procedureId    = (ctype_digit($procedureIdRaw) && (int) $procedureIdRaw > 0)
            ? (int) $procedureIdRaw
            : null;

        // Older live JS sends the Select2 id in `concern` only.
        if ($procedureId === null && ctype_digit($concern) && (int) $concern > 0) {
            $procedureId = (int) $concern;
        }

        if ($procedureName === '' && $concern !== '' && ! ctype_digit($concern)) {
            $procedureName = $concern;
        }

        $concernLabel = $procedureName !== '' ? $procedureName : $concern;
        $description  = $message !== ''
            ? ($concernLabel !== '' ? $message . ' | Procedure: ' . $concernLabel : $message)
            : $concernLabel;

        $attr = static function (string $key) use ($data): ?string {
            $value = trim((string) ($data[$key] ?? ''));

            return $value !== '' ? $value : null;
        };

        $crmPayload = [
            'name'                => $data['name'],
            'email'               => $data['email'],
            'mobile_country_code' => '91',
            'mobile'              => $data['phone'],
            'city'                => $data['city'],

            'source_id'           => $data['source_id'] ?? '',
            'source_url'          => $data['source_url'] ?? '',

            'campaign_id'         => $attr('campaign_id'),
            'campaign_name'       => $attr('campaign_name'),

            'ad_id'               => $attr('ad_id'),
            'ad_name'             => $attr('ad_name'),

            'form_id'             => $data['form_id'] ?? '',
            'form_name'           => $data['form_name'] ?? '',

            'procedure_category_id' => $procedureId,
            'description'           => $description,

            'utm_source'          => $attr('utm_source'),
            'utm_medium'          => $attr('utm_medium'),
            'utm_campaign'        => $attr('utm_campaign'),
            'utm_content'         => $attr('utm_content'),
            'utm_term'            => $attr('utm_term'),
            'gclid'               => $attr('gclid'),
            'fbclid'              => $attr('fbclid'),
            'landing_page'        => $attr('landing_page'),
            'referrer'            => $attr('referrer'),

            'first_touch_source'       => $attr('first_touch_source'),
            'first_touch_medium'       => $attr('first_touch_medium'),
            'first_touch_channel'      => $attr('first_touch_channel'),
            'first_touch_campaign'     => $attr('first_touch_campaign'),
            'first_touch_referrer'     => $attr('first_touch_referrer'),
            'first_touch_landing_page' => $attr('first_touch_landing_page'),
            'first_touch_at'           => $attr('first_touch_at'),
            'last_touch_source'        => $attr('last_touch_source'),
            'last_touch_medium'        => $attr('last_touch_medium'),
            'last_touch_channel'       => $attr('last_touch_channel'),
            'last_touch_campaign'      => $attr('last_touch_campaign'),
            'last_touch_referrer'      => $attr('last_touch_referrer'),
            'last_touch_landing_page'  => $attr('last_touch_landing_page'),
            'last_touch_at'            => $attr('last_touch_at'),
        ];

        if ($procedureId === null) {
            unset($crmPayload['procedure_category_id']);
        }

        $this->ihtLog('CRM ATTRIBUTION — ' . json_encode([
            'first_touch_source'       => $crmPayload['first_touch_source'],
            'first_touch_medium'       => $crmPayload['first_touch_medium'],
            'first_touch_channel'      => $crmPayload['first_touch_channel'],
            'first_touch_campaign'     => $crmPayload['first_touch_campaign'],
            'first_touch_referrer'     => $crmPayload['first_touch_referrer'],
            'first_touch_landing_page' => $crmPayload['first_touch_landing_page'],
            'first_touch_at'           => $crmPayload['first_touch_at'],
            'last_touch_source'        => $crmPayload['last_touch_source'],
            'last_touch_medium'        => $crmPayload['last_touch_medium'],
            'last_touch_channel'       => $crmPayload['last_touch_channel'],
            'last_touch_campaign'      => $crmPayload['last_touch_campaign'],
            'last_touch_referrer'      => $crmPayload['last_touch_referrer'],
            'last_touch_landing_page'  => $crmPayload['last_touch_landing_page'],
            'last_touch_at'            => $crmPayload['last_touch_at'],
            'utm_source'               => $crmPayload['utm_source'],
            'utm_medium'               => $crmPayload['utm_medium'],
            'utm_campaign'             => $crmPayload['utm_campaign'],
        ], JSON_UNESCAPED_SLASHES));

        $crmSynced = $this->forwardToCrm($crmPayload);

        if (! $crmSynced) {
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => 'Something went wrong. Please try again.',
            ]);
        }

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Thank you. Our team will contact you shortly.',
        ]);
        } catch (\Throwable $e) {
            $this->ihtLog('SUBMIT FAILED: ' . $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => 'Something went wrong. Please try again.',
            ]);
        }
    }

    private function forwardToCrm(array $payload): bool
    {
        $apiBase = trim((string) env('api.baseURL', ''));

        if ($apiBase === '') {
            $this->ihtLog('CRM SKIPPED: api.baseURL is not configured');

            return false;
        }

        try {
            $url = rtrim($apiBase, '/') . '/campaign-leads';
            $response = Services::curlrequest()->post($url, [
                'headers' => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
                'http_errors' => false,
                'timeout' => 15,
            ]);

            $body   = json_decode($response->getBody(), true);
            $status = (int) $response->getStatusCode();

            if ($status >= 200 && $status < 300 && ($body['status'] ?? false)) {
                $this->ihtLog('CRM SUCCESS — ' . $payload['name'] . ' | +91' . $payload['mobile']);

                return true;
            }

            $this->ihtLog('CRM FAILED (' . $status . '): ' . $response->getBody());

            return false;
        } catch (\Throwable $e) {
            $this->ihtLog('CRM FAILED: ' . $e->getMessage());

            return false;
        }
    }

    private function sendLeadEmail(array $data): bool
    {
        $phone = preg_replace('/\D/', '', (string) ($data['phone'] ?? '')) ?? '';
        $email = trim((string) ($data['email'] ?? ''));
        $name  = trim((string) ($data['name'] ?? ''));
        $city  = trim((string) ($data['city'] ?? ''));
        $src   = trim((string) ($data['source'] ?? ''));

        if ($name === '' || $city === '' || ! preg_match('/^[6-9]\d{9}$/', $phone)) {
            return false;
        }

        $concern = trim((string) ($data['concern'] ?? ''));
        $message = trim((string) ($data['message'] ?? ''));
        $source  = $src;

        if ($concern !== '') {
            $source .= ' | Procedure: ' . $concern;
        }

        if ($message !== '') {
            $source .= ' | Message: ' . $message;
        }

        $submitted = date('d M Y, H:i:s');
        $mailData  = [
            'name'        => $name,
            'phone'       => $phone,
            'email'       => $email,
            'city'        => $city,
            'source'      => $source,
            'submitted'   => $submitted,
            'whatsappUrl' => 'https://wa.me/91' . $phone . '?text=' . rawurlencode('Hi ' . $name . ', this is IHT team. We received your consultation request. When is a good time to connect?'),
        ];

        $emailConfig = $this->emailConfig();
        $mail        = Services::email($emailConfig);
        $mail->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
        $mail->setTo(env('email.leadEmail', 'rakesh.sharma@akclinics.com'));

        if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->setReplyTo($email, $name);
        }

        $mail->setSubject('New Lead: ' . $name . ' | ' . $city . ' — IHT');
        $mail->setMessage(view('emails/lead_notification', $mailData));
        $mail->setAltMessage(view('emails/lead_notification_text', $mailData));

        try {
            if (! $mail->send(false)) {
                $this->ihtLog('SMTP FAILED: ' . $mail->printDebugger(['headers']));

                return false;
            }

            $this->ihtLog('EMAIL SUCCESS — ' . $name . ' +91' . $phone);

            if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mail->clear(true);
                $mail->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
                $mail->setTo($email);
                $mail->setReplyTo($emailConfig->fromEmail, $emailConfig->fromName);
                $mail->setSubject('Your Consultation Request — India Hair Transplant');
                $mail->setMessage(view('emails/patient_confirmation', $mailData));
                $mail->setAltMessage(view('emails/patient_confirmation_text', $mailData));

                try {
                    $mail->send(false);
                    $this->ihtLog('Patient confirmation sent to ' . $email);
                } catch (\Throwable $ex) {
                    $this->ihtLog('Patient confirmation failed: ' . $ex->getMessage());
                }
            }

            return true;
        } catch (\Throwable $e) {
            $this->ihtLog('SMTP FAILED: ' . $e->getMessage());

            return false;
        }
    }

    private function emailConfig(): \Config\Email
    {
        $emailConfig = config('Email');
        $emailConfig->protocol   = 'smtp';
        $emailConfig->SMTPHost   = env('email.SMTPHost', 'smtp.hostinger.com');
        $emailConfig->SMTPUser   = env('email.SMTPUser', '');
        $emailConfig->SMTPPass   = env('email.SMTPPass', '');
        $emailConfig->SMTPPort   = (int) env('email.SMTPPort', 587);
        $emailConfig->SMTPCrypto = env('email.SMTPCrypto', 'tls');
        $emailConfig->mailType   = 'html';
        $emailConfig->charset    = 'UTF-8';
        $emailConfig->fromEmail  = env('email.fromEmail', $emailConfig->SMTPUser);
        $emailConfig->fromName   = env('email.fromName', 'India Hair Transplant');

        return $emailConfig;
    }

    private function ihtLog(string $msg): void
    {
        try {
            $dir = rtrim((string) WRITEPATH, '/\\') . DIRECTORY_SEPARATOR . 'logs';
            if (! is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }

            $file = $dir . DIRECTORY_SEPARATOR . 'iht-form-log.txt';
            @file_put_contents($file, '[' . date('d-M-Y H:i:s') . '] ' . $msg . PHP_EOL, FILE_APPEND | LOCK_EX);
        } catch (\Throwable $e) {
            // Logging must never break form submission.
        }
    }
}