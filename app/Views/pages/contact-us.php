<?= $this->extend('layouts/app') ?>

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
          <div class="cfield">
            <input type="text" id="contact_name" name="name" placeholder="Name*" required>
          </div>

          <div class="cfield">
            <input type="email" id="contact_email" name="email" placeholder="Email*" required>
          </div>

          <div class="cfield">
            <input type="tel" id="contact_phone" name="phone" placeholder="Phone*" required>
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
              <path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1.3 1.3 0 0 1 1.3-.3 10.2 10.2 0 0 0 3.3.5 1.3 1.3 0 0 1 1.3 1.3v3.7a1.3 1.3 0 0 1-1.3 1.3A18.7 18.7 0 0 1 3 5.4 1.3 1.3 0 0 1 4.3 4h3.7A1.3 1.3 0 0 1 9.3 5.3c0 1.1.2 2.2.5 3.3Z" fill="currentColor"/>
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
              <path d="M4 6h16v12H4z" fill="none" stroke="currentColor" stroke-width="1.6"/>
              <path d="m4 7 8 6 8-6" fill="none" stroke="currentColor" stroke-width="1.6"/>
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
              <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="1.6"/>
              <path d="M12 6v6l4 2" fill="none" stroke="currentColor" stroke-width="1.6"/>
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
document.getElementById('contactForm').addEventListener('submit', function (e) {
  e.preventDefault();

  var statusEl = document.getElementById('contactFormStatus');
  var name = document.getElementById('contact_name').value.trim();
  var email = document.getElementById('contact_email').value.trim();
  var phone = document.getElementById('contact_phone').value.trim();
  var city = document.getElementById('contact_location').value.trim();
  var message = document.getElementById('contact_message').value.trim();
  var phoneDigits = phone.replace(/\D/g, '');

  if (!name || !email || !city || !/^[6-9]\d{9}$/.test(phoneDigits)) {
    statusEl.style.display = 'block';
    statusEl.style.color = '#b45309';
    statusEl.textContent = 'Please fill in all required fields with a valid phone number.';
    return;
  }

  statusEl.style.display = 'block';
  statusEl.style.color = '#64748b';
  statusEl.textContent = 'Sending...';

  fetch('<?= base_url('form-handler') ?>', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      action: 'save_lead',
      name: name,
      email: email,
      phone: phoneDigits,
      city: city,
      concern: 'not-sure',
      source_url: window.location.href + (message ? ' | Message: ' + message : ''),
    }),
  })
  .then(function (r) { return r.json(); })
  .then(function () {
    statusEl.style.color = '#15803d';
    statusEl.textContent = 'Thank you. Our team will contact you shortly.';
    document.getElementById('contactForm').reset();
  })
  .catch(function () {
    statusEl.style.color = '#15803d';
    statusEl.textContent = 'Thank you. Our team will contact you shortly.';
    document.getElementById('contactForm').reset();
  });
});
</script>
<?= $this->endSection() ?>
