<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<!-- Header File Include -->
<!-- HERO -->
  <section class="page-hero">
    <div class="container wrap">
      <div class="breadcrumb">Home › Contact Us</div>
      <h1 class="page-title">Contact Us</h1>
      <p class="page-sub">
        Fill in your details and preferred clinic location. Our team will connect with you shortly.
      </p>
    </div>
  </section>

  <!-- CONTACT SECTION -->
  <section class="contact-sec">
    <div class="container">
      <div class="contact-card">

        <!-- FORM -->
        <div class="contact-form">
          <h2 class="contact-h2">Book a Consultation</h2>
          <p class="contact-sub">
            Simply fill in your details and we’ll get in touch with you shortly.
          </p>

          <form id="contactForm">
            <div class="cfield">
              <input type="text" placeholder="Name*" required>
            </div>

            <div class="cfield">
              <input type="email" placeholder="Email*" required>
            </div>

            <div class="cfield">
              <input type="tel" placeholder="Phone*" required>
            </div>

            <div class="cfield">
              <select required>
                <option value="">Choose Clinic Location*</option>
                <option>Delhi</option>
                <option>Ludhiana</option>
                <option>Bangalore</option>
              </select>
            </div>

            <div class="cfield">
              <textarea placeholder="Message"></textarea>
            </div>

            <div class="cchecks">
              <label class="cchk">
                <input type="checkbox" required>
                <span>I consent to being contacted as per the Privacy Policy.</span>
              </label>
            </div>

            <button class="btn" type="submit">SEND MESSAGE</button>
          </form>
        </div>

        <!-- CONTACT INFO -->
        <aside class="contact-info">
          <h3 class="ci-title">Contact info</h3>

          <div class="ci-item">
            <span class="ci-ico">
              <svg viewBox="0 0 24 24">
                <path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1.3 1.3 0 0 1 1.3-.3 10.2 10.2 0 0 0 3.3.5 1.3 1.3 0 0 1 1.3 1.3v3.7a1.3 1.3 0 0 1-1.3 1.3A18.7 18.7 0 0 1 3 5.4 1.3 1.3 0 0 1 4.3 4h3.7A1.3 1.3 0 0 1 9.3 5.3c0 1.1.2 2.2.5 3.3Z"
                      fill="currentColor"/>
              </svg>
            </span>
            <div>
              <div class="ci-label">Phone</div>
              <div class="ci-val">+91 97799 44207</div>
            </div>
          </div>

          <div class="ci-item">
            <span class="ci-ico">
              <svg viewBox="0 0 24 24">
                <path d="M4 6h16v12H4z" fill="none"
                      stroke="currentColor" stroke-width="1.6"/>
                <path d="m4 7 8 6 8-6" fill="none"
                      stroke="currentColor" stroke-width="1.6"/>
              </svg>
            </span>
            <div>
              <div class="ci-label">Email</div>
              <div class="ci-val">info@indiahairtransplant.com</div>
            </div>
          </div>

          <div class="ci-item">
            <span class="ci-ico">
              <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"
                        fill="none" stroke="currentColor" stroke-width="1.6"/>
                <path d="M12 6v6l4 2"
                      fill="none" stroke="currentColor" stroke-width="1.6"/>
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
<!-- Footer File Include -->

<?= $this->endSection() ?>
