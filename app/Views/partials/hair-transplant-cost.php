<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/hair-transplant-cost.css') ?>">
<?= $this->endSection() ?>
<section class="journey-sec">
    <div class="container">

        <h2 class="results-title journey-title">Know Your Hair Transplant Cost in India</h2>

        <div class="results-divider journey-divider" aria-hidden="true">
            <span class="line"></span>
            <span class="cross">✚</span>
            <span class="line"></span>
        </div>

        <div class="journey-box" role="form" aria-label="Hair Transplant Cost Calculator">

            <div class="scale-row" role="group" aria-label="Select your baldness stage">
                <button type="button" class="scale-item active" aria-pressed="true">
                    <img src="<?= base_url('assets/images/grade-1.webp') ?>" alt="Stage 1">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/Grade-2.webp') ?>" alt="Stage 2">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/Grade-3.webp') ?>" alt="Stage 3">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/Grade-4.webp') ?>" alt="Stage 4">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/Grade-5.webp') ?>" alt="Stage 5">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/Grade-6.webp') ?>" alt="Stage 6">
                </button>

                <button type="button" class="scale-item">
                    <img src="<?= base_url('assets/images/grade-7.webp') ?>" alt="Stage 7">
                </button>
            </div>

            <form id="costCalculatorForm" class="journey-form journey-form--two" action="#" method="post" novalidate>
                <input type="hidden" id="utm_source" name="utm_source">
                <input type="hidden" id="utm_medium" name="utm_medium">
                <input type="hidden" id="utm_campaign" name="utm_campaign">
                <input type="hidden" id="utm_content" name="utm_content">
                <input type="hidden" id="utm_term" name="utm_term">
                <input type="hidden" id="gclid" name="gclid">
                <input type="hidden" id="fbclid" name="fbclid">
                <input type="hidden" id="landing_page" name="landing_page">
                <input type="hidden" id="referrer" name="referrer">
                <input type="hidden" id="first_touch_source" name="first_touch_source">
                <input type="hidden" id="first_touch_medium" name="first_touch_medium">
                <input type="hidden" id="first_touch_channel" name="first_touch_channel">
                <input type="hidden" id="first_touch_campaign" name="first_touch_campaign">
                <input type="hidden" id="first_touch_referrer" name="first_touch_referrer">
                <input type="hidden" id="first_touch_landing_page" name="first_touch_landing_page">
                <input type="hidden" id="first_touch_at" name="first_touch_at">
                <input type="hidden" id="last_touch_source" name="last_touch_source">
                <input type="hidden" id="last_touch_medium" name="last_touch_medium">
                <input type="hidden" id="last_touch_channel" name="last_touch_channel">
                <input type="hidden" id="last_touch_campaign" name="last_touch_campaign">
                <input type="hidden" id="last_touch_referrer" name="last_touch_referrer">
                <input type="hidden" id="last_touch_landing_page" name="last_touch_landing_page">
                <input type="hidden" id="last_touch_at" name="last_touch_at">

                <input type="hidden" id="source_url" name="source_url">
                <input type="hidden" id="source_id" name="source_id" value="website">
                <input type="hidden" id="campaign_id" name="campaign_id" value="">
                <input type="hidden" id="campaign_name" name="campaign_name" value="">
                <input type="hidden" id="ad_id" name="ad_id" value="">
                <input type="hidden" id="ad_name" name="ad_name" value="">
                <input type="hidden" id="form_id" name="form_id" value="website-cost-calculator-form">
                <?php
                  $formPageName = trim((string) ($pageTitle ?? ''));
                  if ($formPageName === '') {
                      $slug = trim((string) uri_string(), '/');
                      $formPageName = $slug !== ''
                          ? ucwords(str_replace(['-', '_'], ' ', $slug))
                          : 'Home';
                  }
                ?>
                <input type="hidden" id="form_name" name="form_name" value="<?= esc($formPageName) ?>">

                <input type="hidden" id="contact_message" name="message" value="">
                <input type="hidden" id="procedure_category" name="procedure_category" value="Hair Transplant">

                <div class="form-group">
                    <label class="vh" for="jn">Name</label>
                    <input class="jf-input" id="jn" type="text" name="name" placeholder="Enter your name" required>
                    <small class="error-message" id="nameError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="jp">Phone</label>
                    <input class="jf-input" id="jp" type="tel" name="phone" placeholder="Enter 10-digit number" maxlength="10" required>
                    <small class="error-message" id="phoneError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="je">Email</label>
                    <input class="jf-input" id="je" type="email" name="email" placeholder="Enter your email" required>
                    <small class="error-message" id="emailError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="jc">City</label>
                    <input class="jf-input" id="jc" type="text" name="city" placeholder="Type your city" required>
                    <small class="error-message" id="cityError"></small>
                </div>

                <button type="submit" class="btn-cta btn--block">
                    Calculate Your Hair Transplant Cost
                </button>
                <p id="contactFormStatus" role="status" style="display:none;margin:12px 0 0;font-size:14px;"></p>
            </form>

        </div>
    </div>
</section>

<script>
  window.CONTACT_SUBMIT_URL = window.CONTACT_SUBMIT_URL || "<?= base_url('contact-submit') ?>";
</script>
<script src="<?= base_url('assets/js/utm-lead-attribution.js') ?>?v=<?= @filemtime(FCPATH . 'assets/js/utm-lead-attribution.js') ?: time() ?>"></script>
<script src="<?= base_url('assets/js/hair-transplant-cost.js') ?>?v=<?= @filemtime(FCPATH . 'assets/js/hair-transplant-cost.js') ?: time() ?>"></script>
