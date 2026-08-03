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
                <input type="hidden" id="source_url" name="source_url">
                <input type="hidden" id="source_id" name="source_id" value="website">

                <input type="hidden" id="campaign_id" name="campaign_id" value="120212345678901234">
                <input type="hidden" id="campaign_name" name="campaign_name" value="Website">

                <input type="hidden" id="ad_id" name="ad_id" value="1">
                <input type="hidden" id="ad_name" name="ad_name" value="1">

                <input type="hidden" id="form_id" name="form_id" value="website-contact-form">
                <input type="hidden" id="form_name" name="form_name" value="Contact Us">

                <input type="hidden" id="contact_message" name="message" value="">
                <input type="hidden" id="procedure_category" name="procedure_category" value="1">
                <div class="form-group">
                    <label class="vh" for="jn">Name</label>
                    <input class="jf-input" id="jn" type="text" name="name" placeholder="Enter your name">
                    <small class="error-message" id="nameError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="jp">Phone</label>
                    <input class="jf-input" id="jp" type="tel" name="phone" placeholder="Enter 10-digit number">
                    <small class="error-message" id="phoneError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="je">Email</label>
                    <input class="jf-input" id="je" type="email" name="email" placeholder="Enter your email">
                    <small class="error-message" id="emailError"></small>
                </div>

                <div class="form-group">
                    <label class="vh" for="jc">City</label>
                    <input class="jf-input" id="jc" type="text" name="city" placeholder="Type your city">
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

<script src="<?= base_url('assets/js/hair-transplant-cost.js') ?>"></script>
