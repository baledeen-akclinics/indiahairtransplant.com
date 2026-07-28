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
        $subject   = 'New Lead: ' . $name . ' | ' . $city . ' — IHT';
        $wa        = 'https://wa.me/91' . $ph . '?text=' . rawurlencode('Hi ' . $name . ', this is IHT team. We received your consultation request. When is a good time to connect?');

        $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:20px 0;">
<tr><td align="center">
<table width="560" cellpadding="0" cellspacing="0" style="max-width:560px;width:100%;background:#fff;border-radius:10px;overflow:hidden;">
<tr><td style="background:#0f1831;padding:18px 24px;">
  <p style="margin:0 0 2px;font-size:11px;color:#94a3b8;text-transform:uppercase;">India Hair Transplant</p>
  <h1 style="margin:0;font-size:19px;color:#fff;font-weight:800;">New Consultation Lead</h1>
</td></tr>
<tr><td style="background:#fffbeb;padding:9px 24px;border-bottom:1px solid #fde68a;">
  <p style="margin:0;font-size:13px;color:#92400e;font-weight:600;">Received: ' . $submitted . ' — please follow up within 24 hours</p>
</td></tr>
<tr><td style="padding:18px 24px 6px;">
  <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;border-bottom:1px solid #e2e8f0;padding-bottom:6px;">Patient Details</p>
  <table width="100%" cellpadding="0" cellspacing="0" style="font-size:13px;">
    <tr><td style="width:34%;padding:6px 0;color:#64748b;font-weight:600;">Name</td><td style="padding:6px 0;color:#0f172a;font-weight:700;font-size:14px;">' . $name . '</td></tr>
    <tr style="background:#f8fafc;"><td style="padding:6px 8px;color:#64748b;font-weight:600;">Phone</td><td style="padding:6px 8px;"><a href="tel:+91' . $ph . '" style="color:#f59e0b;font-weight:700;text-decoration:none;font-size:14px;">+91 ' . $ph . '</a></td></tr>
    <tr><td style="padding:6px 0;color:#64748b;font-weight:600;">Email</td><td style="padding:6px 0;">' . ($email ? '<a href="mailto:' . $email . '" style="color:#f59e0b;">' . $email . '</a>' : '<span style="color:#94a3b8;">Not provided</span>') . '</td></tr>
    <tr style="background:#f8fafc;"><td style="padding:6px 8px;color:#64748b;font-weight:600;">City</td><td style="padding:6px 8px;color:#0f172a;font-weight:700;">' . $city . '</td></tr>
  </table>
</td></tr>
<tr><td style="padding:14px 24px 18px;">
  <table cellpadding="0" cellspacing="0"><tr>
    <td style="padding-right:10px;"><a href="tel:+91' . $ph . '" style="display:inline-block;background:#0f1831;color:#fff;font-size:13px;font-weight:700;padding:10px 18px;border-radius:8px;text-decoration:none;">Call Now</a></td>
    <td><a href="' . $wa . '" style="display:inline-block;background:#25d366;color:#fff;font-size:13px;font-weight:700;padding:10px 18px;border-radius:8px;text-decoration:none;">WhatsApp</a></td>
  </tr></table>
</td></tr>
<tr><td style="background:#f8fafc;padding:10px 24px;border-top:1px solid #e2e8f0;">
  <p style="margin:0;font-size:11px;color:#94a3b8;">Source: ' . ($src ?: 'indiahairtransplant.com') . '</p>
</td></tr>
</table></td></tr></table>
</body></html>';

        $plain = "NEW LEAD — IHT\nName: $name\nPhone: +91 $ph\nEmail: " . ($email ?: 'Not provided') . "\nCity: $city\nWhen: $submitted\nSource: $src";

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

        $leadEmail = env('email.leadEmail', 'rakesh.sharma@akclinics.com');
        $leadName  = env('email.leadName', 'Rakesh Sharma');

        $mail = \Config\Services::email($emailConfig);
        $mail->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
        $mail->setTo($leadEmail);
        if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->setReplyTo($email, $name);
        }
        $mail->setSubject($subject);
        $mail->setMessage($html);
        $mail->setAltMessage($plain);

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
                $mail->setMessage('<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body style="font-family:Arial,sans-serif;background:#f1f5f9;padding:20px;"><table width="540" cellpadding="0" cellspacing="0" style="max-width:540px;margin:0 auto;background:#fff;border-radius:10px;overflow:hidden;"><tr><td style="background:#0f1831;padding:18px 22px;"><h1 style="margin:0;font-size:17px;color:#fff;font-weight:800;">Consultation Request Confirmed</h1></td></tr><tr><td style="padding:20px 22px;"><p style="margin:0 0 10px;font-size:14px;color:#0f172a;">Dear <strong>' . $name . '</strong>,</p><p style="margin:0 0 14px;font-size:14px;color:#374151;line-height:1.6;">Thank you for contacting India Hair Transplant. We have received your request and will call you within <strong>24 hours</strong>.</p></td></tr></table></body></html>');
                $mail->setAltMessage("Dear $name,\nYour request is confirmed. We will call you within 24 hours.\nCall: +91 97799 44207");
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

        // Always return success to the client (legacy behaviour)
        return $response->setJSON(['success' => true]);
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
