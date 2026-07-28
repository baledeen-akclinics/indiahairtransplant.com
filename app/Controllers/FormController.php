<?php

namespace App\Controllers;

class FormController extends BaseController
{
    public function handle()
    {
        $response = $this->response->setHeader('X-Content-Type-Options', 'nosniff');

        if ($this->request->getMethod() === 'options') {
            return $response->setStatusCode(204);
        }

        $d = $this->request->getJSON(true);
        if (! is_array($d)) {
            $d = $this->request->getPost();
        }
        if (! is_array($d)) {
            $this->ihtLog('ERROR: Invalid JSON/input');
            return $response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Invalid JSON']);
        }

        $action = $this->cl((string) ($d['action'] ?? 'save_lead'));
        $name   = $this->cl((string) ($d['name'] ?? ''));
        $phone  = $this->cl((string) ($d['phone'] ?? ''));
        $email  = $this->cl((string) ($d['email'] ?? ''));
        $city   = $this->cl((string) ($d['city'] ?? ''));
        $con    = $this->cl((string) ($d['concern'] ?? ''));
        $grade  = $this->cl((string) ($d['grade'] ?? ''));
        $time   = $this->cl((string) ($d['preferred_time'] ?? ''));
        $src    = $this->cl((string) ($d['source_url'] ?? ''));
        $ph     = preg_replace('/\D/', '', $phone) ?? '';

        if (! $name || ! $city || ! preg_match('/^[6-9]\d{9}$/', $ph)) {
            $this->ihtLog('VALIDATION FAIL: name=' . $name . ' phone=' . $ph . ' city=' . $city);
            return $response->setStatusCode(422)->setJSON(['success' => false, 'message' => 'Required fields missing']);
        }

        $conLabel = [
            'hair-transplant' => 'Hair Transplant',
            'hair-loss'       => 'Hair Loss',
            'prp-gfc'         => 'PRP / GFC',
            'not-sure'        => 'Not Sure',
        ][$con] ?? ($con ?: 'Not selected');

        $gradeLabel = [
            'early'    => 'Early — mild thinning',
            'moderate' => 'Moderate — visible loss',
            'advanced' => 'Advanced — Norwood 4+',
            'severe'   => 'Severe — large bald area',
        ][$grade] ?? ($grade ?: 'Not specified');

        $timeLabel = [
            'morning'   => 'Morning 9–12 PM',
            'afternoon' => 'Afternoon 12–4 PM',
            'evening'   => 'Evening 4–7 PM',
        ][$time] ?? ($time ?: 'Any time');

        if ($action === 'update_lead') {
            $this->ihtLog('UPDATE — ' . $name . ' +91' . $ph . ' | Concern: ' . $conLabel . ' | Stage: ' . $gradeLabel . ' | Time: ' . $timeLabel);
            return $response->setJSON(['success' => true]);
        }

        $this->ihtLog('NEW LEAD — ' . $name . ' | +91' . $ph . ' | ' . $city . ' | ' . $src);

        $submitted = date('d M Y, H:i:s');
        $mailData  = [
            'name'         => $name,
            'phone'        => $ph,
            'email'        => $email,
            'city'         => $city,
            'source'       => $src,
            'submitted'    => $submitted,
            'whatsappUrl'  => 'https://wa.me/91' . $ph . '?text=' . rawurlencode('Hi ' . $name . ', this is IHT team. We received your consultation request. When is a good time to connect?'),
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
                $this->ihtLog('SUCCESS — email sent for ' . $name . ' +91' . $ph);
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

        return $response->setJSON(['success' => true]);
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
        $file = WRITEPATH . 'logs/iht-form-log.txt';
        file_put_contents($file, '[' . date('d-M-Y H:i:s') . '] ' . $msg . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}
