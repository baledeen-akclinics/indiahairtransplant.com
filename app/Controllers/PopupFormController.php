<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class PopupFormController extends BaseController
{
    public function submit()
    {
        if (strtolower($this->request->getMethod()) === 'options') {
            return $this->response->setStatusCode(204);
        }

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
                'rules' => 'permit_empty|valid_email',
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
                'rules' => 'permit_empty|max_length[200]',
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
            $message       = trim((string) ($data['message'] ?? ''));
            $concern       = trim((string) ($data['concern'] ?? ''));
            $procedureName = trim((string) ($data['procedure_name'] ?? ''));
            $grade         = trim((string) ($data['grade'] ?? ''));
            $preferredTime = trim((string) ($data['preferred_time'] ?? ''));
            $email         = trim((string) ($data['email'] ?? ''));
            $formId        = trim((string) ($data['form_id'] ?? ''));
            $formName      = trim((string) ($data['form_name'] ?? ''));

            $concernLabel = $procedureName !== '' ? $procedureName : $concern;
            $description  = $message !== ''
                ? ($concernLabel !== '' ? $message . ' | Procedure: ' . $concernLabel : $message)
                : $concernLabel;

            $extraNotes = [];
            if ($grade !== '') {
                $extraNotes[] = 'Hair Loss Stage: ' . $grade;
            }
            if ($preferredTime !== '') {
                $extraNotes[] = 'Best Time to Call: ' . $preferredTime;
            }
            if ($extraNotes !== []) {
                $description = trim($description . ($description !== '' ? ' | ' : '') . implode(' | ', $extraNotes));
            }

            $attr = static function (string $key) use ($data): ?string {
                $value = trim((string) ($data[$key] ?? ''));

                return $value !== '' ? $value : null;
            };

            $crmPayload = [
                'name'                => $data['name'],
                'mobile_country_code' => '91',
                'mobile'              => $data['phone'],
                'city'                => $data['city'],

                'source_id'           => $data['source_id'] ?? 'website',
                'source_url'          => $data['source_url'] ?? '',

                'campaign_id'         => $attr('campaign_id'),
                'campaign_name'       => $attr('campaign_name'),

                'ad_id'               => $attr('ad_id'),
                'ad_name'             => $attr('ad_name'),

                'form_id'             => $formId !== '' ? $formId : 'website-popup-form',
                'form_name'           => $formName,

                'description'         => $description,

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
                'last_touch_campaign'     => $attr('last_touch_campaign'),
                'last_touch_referrer'      => $attr('last_touch_referrer'),
                'last_touch_landing_page'  => $attr('last_touch_landing_page'),
                'last_touch_at'            => $attr('last_touch_at'),
            ];

            if ($email !== '') {
                $crmPayload['email'] = $email;
            }

            $this->ihtLog('POPUP CRM ATTRIBUTION — ' . json_encode([
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
                'source_url'               => $crmPayload['source_url'],
                'form_id'                  => $crmPayload['form_id'],
            ], JSON_UNESCAPED_SLASHES));

            $crmSynced = $this->forwardToCrm($crmPayload);

            if (! $crmSynced) {
                return $this->response->setStatusCode(500)->setJSON([
                    'status'  => false,
                    'message' => 'Something went wrong. Please try again.',
                ]);
            }

            $phoneDigits = preg_replace('/\D/', '', (string) $data['phone']) ?? '';
            $this->sendLeadEmail(
                (string) $data['name'],
                $phoneDigits,
                $email,
                (string) $data['city'],
                (string) ($crmPayload['source_url'] ?? '')
            );

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Thank you. Our team will contact you shortly.',
            ]);
        } catch (\Throwable $e) {
            $this->ihtLog('POPUP SUBMIT FAILED: ' . $e->getMessage());

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
            $this->ihtLog('POPUP CRM SKIPPED: api.baseURL is not configured');

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
                $this->ihtLog('POPUP CRM SUCCESS — ' . $payload['name'] . ' | +91' . $payload['mobile']);

                return true;
            }

            $this->ihtLog('POPUP CRM FAILED (' . $status . '): ' . $response->getBody());

            return false;
        } catch (\Throwable $e) {
            $this->ihtLog('POPUP CRM FAILED: ' . $e->getMessage());

            return false;
        }
    }

    /**
     * Existing FormController email behavior (copied, not called via FormController).
     * Team lead notification, then patient confirmation when a valid email is present.
     */
    private function sendLeadEmail(string $name, string $phone, string $email, string $city, string $src): void
    {
        $name  = $this->cl($name);
        $phone = $this->cl($phone);
        $email = $this->cl($email);
        $city  = $this->cl($city);
        $src   = $this->cl($src);

        $this->ihtLog('NEW LEAD — ' . $name . ' | +91' . $phone . ' | ' . $city . ' | ' . $src);

        $submitted = date('d M Y, H:i:s');
        $mailData  = [
            'name'         => $name,
            'phone'        => $phone,
            'email'        => $email,
            'city'         => $city,
            'source'       => $src,
            'submitted'    => $submitted,
            'whatsappUrl'  => 'https://wa.me/91' . $phone . '?text=' . rawurlencode('Hi ' . $name . ', this is IHT team. We received your consultation request. When is a good time to connect?'),
        ];

        $emailConfig = $this->emailConfig();
        $mail = \Config\Services::email($emailConfig);
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
            } else {
                $this->ihtLog('SUCCESS — email sent for ' . $name . ' +91' . $phone);
            }

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
        } catch (\Throwable $e) {
            $this->ihtLog('SMTP FAILED: ' . $e->getMessage());
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

    private function cl(string $v): string
    {
        return htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES | ENT_HTML5, 'UTF-8');
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
