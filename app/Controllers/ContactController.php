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
            'source_url'    => 'required',
            'source_id'     => 'required',
            'campaign_id'   => 'required',
            'campaign_name' => 'required',
            'form_id'       => 'required',
            'form_name'     => 'required',
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

        $message = trim((string) ($data['message'] ?? ''));
        $concern = trim((string) ($data['concern'] ?? ''));
        $description = $message !== '' ? $message . ' | Procedure: ' . $concern : $concern;

        $crmPayload = [
            'name'                => $data['name'],
            'email'               => $data['email'],
            'mobile_country_code' => '91',
            'mobile'              => $data['phone'],
            'city'                => $data['city'],

            'source_id'           => $data['source_id'],
            'source_url'          => $data['source_url'],

            'campaign_id'         => $data['campaign_id'],
            'campaign_name'       => $data['campaign_name'],

            'ad_id'               => $data['ad_id'] ?? '',
            'ad_name'             => $data['ad_name'] ?? '',

            'form_id'             => $data['form_id'],
            'form_name'           => $data['form_name'],

            'concern'             => $data['concern'],
            'description'         => $description,

            'utm_source'          => trim((string) ($data['utm_source'] ?? '')),
            'utm_medium'          => trim((string) ($data['utm_medium'] ?? '')),
            'utm_campaign'        => trim((string) ($data['utm_campaign'] ?? '')),
            'utm_content'         => trim((string) ($data['utm_content'] ?? '')),
            'utm_term'            => trim((string) ($data['utm_term'] ?? '')),
            'gclid'               => trim((string) ($data['gclid'] ?? '')),
            'fbclid'              => trim((string) ($data['fbclid'] ?? '')),
            'landing_page'        => trim((string) ($data['landing_page'] ?? '')),
            'referrer'            => trim((string) ($data['referrer'] ?? '')),
        ];

        $crmSynced = $this->forwardToCrm($crmPayload);
        $emailSent = $this->sendLeadEmail([
            'name'    => $data['name'],
            'phone'   => $data['phone'],
            'email'   => $data['email'],
            'city'    => $data['city'],
            'concern' => $concern,
            'message' => $message,
            'source'  => $data['source_url'],
        ]);

        if (! $crmSynced && ! $emailSent) {
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => 'Something went wrong. Please try again.',
            ]);
        }

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Thank you. Our team will contact you shortly.',
        ]);
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
        $file = WRITEPATH . 'logs/iht-form-log.txt';
        file_put_contents($file, '[' . date('d-M-Y H:i:s') . '] ' . $msg . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}