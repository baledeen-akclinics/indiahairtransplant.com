<?= $this->extend('layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/contact-us.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="page-hero">
  <div class="container wrap">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?= base_url() ?>">Home</a>
      <span class="sep">›</span>
      <span aria-current="page">Contact Us</span>
    </nav>
    <h1 class="page-title">Contact Us</h1>
    <p class="page-sub">
      Fill in your details and preferred clinic location. Our team will connect with you shortly.
    </p>
  </div>
</section>

<section class="contact-sec">
  <div class="container">
    <div class="contact-card">

      <div class="contact-form">
        <h2 class="contact-h2">Book a Consultation</h2>
        <p class="contact-sub">
          Simply fill in your details and we’ll get in touch with you shortly.
        </p>

        <form id="contactForm" novalidate>
          <input type="hidden" id="source_url" name="source_url">
          <input type="hidden" id="source_id" name="source_id" value="website">

          <input type="hidden" id="campaign_id" name="campaign_id" value="120212345678901234">
          <input type="hidden" id="campaign_name" name="campaign_name" value="Website">

          <input type="hidden" id="ad_id" name="ad_id" value="1">
          <input type="hidden" id="ad_name" name="ad_name" value="1">

          <input type="hidden" id="form_id" name="form_id" value="website-contact-form">
          <input type="hidden" id="form_name" name="form_name" value="Contact Us">
          <div class="cfield">
            <input
              type="text"
              id="contact_name"
              name="name"
              placeholder="Name*"
              required>
            <small id="nameError" style="color:red;display:none;"></small>
          </div>

          <div class="cfield">
            <input
              type="email"
              id="contact_email"
              name="email"
              placeholder="Email*"
              required>
            <small id="emailError" style="color:red;display:none;"></small>
          </div>
          <div class="cfield">
            <select id="procedure_category" name="procedure_category" required>
              <option value=""></option>
            </select>
          </div>
          <div class="cfield">
            <input
              type="tel"
              id="contact_phone"
              name="phone"
              placeholder="Phone*"
              maxlength="10"
              required>
            <small id="phoneError" style="color:red;display:none;"></small>
          </div>

          <div class="cfield">
            <select id="contact_location" name="city" required>
              <option value="">Choose Clinic Location*</option>
              <option value="Delhi">Delhi</option>
              <option value="Ludhiana">Ludhiana</option>
              <option value="Bangalore">Bangalore</option>
            </select>
          </div>

          <div class="cfield">
            <textarea id="contact_message" name="message" placeholder="Message"></textarea>
          </div>

          <div class="cchecks">
            <label class="cchk">
              <input type="checkbox" id="contact_consent" required>
              <span>I consent to being contacted as per the <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>.</span>
            </label>
          </div>

          <p id="contactFormStatus" role="status" style="display:none;margin:12px 0 0;font-size:14px;"></p>

          <button class="btn" type="submit">SEND MESSAGE</button>
        </form>
      </div>

      <aside class="contact-info">
        <h3 class="ci-title">Contact info</h3>

        <div class="ci-item">
          <span class="ci-ico">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1.3 1.3 0 0 1 1.3-.3 10.2 10.2 0 0 0 3.3.5 1.3 1.3 0 0 1 1.3 1.3v3.7a1.3 1.3 0 0 1-1.3 1.3A18.7 18.7 0 0 1 3 5.4 1.3 1.3 0 0 1 4.3 4h3.7A1.3 1.3 0 0 1 9.3 5.3c0 1.1.2 2.2.5 3.3Z" fill="currentColor" />
            </svg>
          </span>
          <div>
            <div class="ci-label">Phone</div>
            <div class="ci-val"><a href="tel:+919779944207">+91 97799 44207</a></div>
          </div>
        </div>

        <div class="ci-item">
          <span class="ci-ico">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M4 6h16v12H4z" fill="none" stroke="currentColor" stroke-width="1.6" />
              <path d="m4 7 8 6 8-6" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </span>
          <div>
            <div class="ci-label">Email</div>
            <div class="ci-val"><a href="mailto:info@indiahairtransplant.com">info@indiahairtransplant.com</a></div>
          </div>
        </div>

        <div class="ci-item">
          <span class="ci-ico">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="1.6" />
              <path d="M12 6v6l4 2" fill="none" stroke="currentColor" stroke-width="1.6" />
            </svg>
          </span>
          <div>
            <div class="ci-label">Opening Times</div>
            <div class="ci-small">
              Mon–Sat: 10:30 AM – 6:30 PM<br>
              Sunday: Closed
            </div>
          </div>
        </div>

      </aside>

    </div>
  </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  const PROCEDURE_CATEGORIES_URL = "<?= base_url('procedure-categories') ?>";
  const CONTACT_SUBMIT_URL = "<?= base_url('contact-submit') ?>";
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>
<script src="<?= base_url('assets/js/contact-us.js') ?>" defer></script>
<?= $this->endSection() ?>