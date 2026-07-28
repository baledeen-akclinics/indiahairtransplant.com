<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
</head>

<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:20px 0;">
    <tr>
      <td align="center">
        <table width="560" cellpadding="0" cellspacing="0" style="max-width:560px;width:100%;background:#fff;border-radius:10px;overflow:hidden;">
          <tr>
            <td style="background:#0f1831;padding:18px 24px;">
              <p style="margin:0 0 2px;font-size:11px;color:#94a3b8;text-transform:uppercase;">India Hair Transplant</p>
              <h1 style="margin:0;font-size:19px;color:#fff;font-weight:800;">New Consultation Lead</h1>
            </td>
          </tr>
          <tr>
            <td style="background:#fffbeb;padding:9px 24px;border-bottom:1px solid #fde68a;">
              <p style="margin:0;font-size:13px;color:#92400e;font-weight:600;">Received: <?= $submitted ?> — please follow up within 24 hours</p>
            </td>
          </tr>
          <tr>
            <td style="padding:18px 24px 6px;">
              <p style="margin:0 0 10px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;border-bottom:1px solid #e2e8f0;padding-bottom:6px;">Patient Details</p>
              <table width="100%" cellpadding="0" cellspacing="0" style="font-size:13px;">
                <tr>
                  <td style="width:34%;padding:6px 0;color:#64748b;font-weight:600;">Name</td>
                  <td style="padding:6px 0;color:#0f172a;font-weight:700;font-size:14px;"><?= $name ?></td>
                </tr>
                <tr style="background:#f8fafc;">
                  <td style="padding:6px 8px;color:#64748b;font-weight:600;">Phone</td>
                  <td style="padding:6px 8px;"><a href="tel:+91<?= $phone ?>" style="color:#f59e0b;font-weight:700;text-decoration:none;font-size:14px;">+91 <?= $phone ?></a></td>
                </tr>
                <tr>
                  <td style="padding:6px 0;color:#64748b;font-weight:600;">Email</td>
                  <td style="padding:6px 0;">
                    <?php if ($email): ?>
                      <a href="mailto:<?= $email ?>" style="color:#f59e0b;"><?= $email ?></a>
                    <?php else: ?>
                      <span style="color:#94a3b8;">Not provided</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr style="background:#f8fafc;">
                  <td style="padding:6px 8px;color:#64748b;font-weight:600;">City</td>
                  <td style="padding:6px 8px;color:#0f172a;font-weight:700;"><?= $city ?></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:14px 24px 18px;">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td style="padding-right:10px;"><a href="tel:+91<?= $phone ?>" style="display:inline-block;background:#0f1831;color:#fff;font-size:13px;font-weight:700;padding:10px 18px;border-radius:8px;text-decoration:none;">Call Now</a></td>
                  <td><a href="<?= $whatsappUrl ?>" style="display:inline-block;background:#25d366;color:#fff;font-size:13px;font-weight:700;padding:10px 18px;border-radius:8px;text-decoration:none;">WhatsApp</a></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="background:#f8fafc;padding:10px 24px;border-top:1px solid #e2e8f0;">
              <p style="margin:0;font-size:11px;color:#94a3b8;">Source: <?= $source ?: 'indiahairtransplant.com' ?></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>