<!-- IHT CONSULTATION POPUP — popup-form.php  v6
     Location: /inc/popup-form.php
     Open from anywhere: data-popup="consult"  OR  ihtPopup.open() -->

<div class="iht-popup-backdrop" id="ihtPopupBackdrop" role="dialog" aria-modal="true" aria-labelledby="ihtPopupTitle" aria-hidden="true">
  <div class="iht-popup" id="ihtPopup">

    <button class="iht-popup-close" id="ihtPopupClose" type="button" aria-label="Close">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>

    <!-- ===== LEFT PANEL ===== -->
    <div class="iht-popup-left">
      <img src="<?= base_url('assets/images/iht-logo.png') ?>"
           alt="India Hair Transplant" class="iht-popup-logo" width="140" height="40" loading="lazy" />

      <div class="iht-popup-trust"><br><br><br>
        <p class="iht-popup-sub">Stop guessing. Get a specialist's opinion.</p>
      </div>

      <ul class="iht-popup-benefits">
        <li>
          <span class="iht-chk" aria-hidden="true">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8l3.5 3.5L13 5"/></svg>
          </span>
          Team of India's renowned hair surgeons
        </li>
        <li>
          <span class="iht-chk" aria-hidden="true">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8l3.5 3.5L13 5"/></svg>
          </span>
          Surgeon-led procedure, strict sterile protocol
        </li>
        <li>
          <span class="iht-chk" aria-hidden="true">
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8l3.5 3.5L13 5"/></svg>
          </span>
          Customised plan based on your hair loss stage
        </li>
      </ul>

      <div class="iht-popup-stats">
        <div class="iht-popup-stat">
          <strong>15,000+</strong>
          <span>Procedures Done</span>
        </div>
        <div class="iht-popup-stat">
          <strong>20 Years</strong>
          <span>Experience</span>
        </div>
        <div class="iht-popup-stat">
          <strong>98%</strong>
          <span>Satisfaction</span>
        </div>
      </div>
    </div><!-- /left -->

    <!-- ===== RIGHT PANEL ===== -->
    <div class="iht-popup-right">

      <!-- Step bar -->
      <div class="iht-popup-steps" aria-label="Form steps">
        <div class="iht-popup-step active" data-step="1">
          <span class="step-num">1</span>
          <span class="step-label">Your Details</span>
        </div>
        <span class="step-line"></span>
        <div class="iht-popup-step" data-step="2">
          <span class="step-num">2</span>
          <span class="step-label">Hair Concern</span>
        </div>
      </div>

      <form class="iht-popup-form" id="ihtConsultForm" novalidate>

        <!-- ====== STEP 1 ====== -->
        <fieldset class="iht-popup-fieldset" id="ihtStep1">
          <legend class="iht-popup-legend">Find the right solution for your hair loss</legend>

          <div class="iht-form-group">
            <label class="iht-form-label" for="cf_name">Full Name <span class="req">*</span></label>
            <input class="iht-form-input" id="cf_name" name="name" type="text"
                   placeholder="e.g. Rahul Sharma" required autocomplete="name" />
            <span class="iht-form-error" id="err_name" role="alert"></span>
          </div>

          <div class="iht-form-row2">
            <div class="iht-form-group">
              <label class="iht-form-label" for="cf_phone">Phone <span class="req">*</span></label>
              <div class="iht-phone-wrap">
                <span class="iht-flag" aria-hidden="true">
                  <svg viewBox="0 0 24 18" width="22" height="16"><rect width="24" height="18" fill="#FF9933"/><rect y="6" width="24" height="6" fill="#fff"/><rect y="12" width="24" height="6" fill="#138808"/><circle cx="12" cy="9" r="2.6" fill="none" stroke="#000080" stroke-width=".7"/></svg>
                  +91
                </span>
                <input class="iht-form-input iht-phone-inp" id="cf_phone" name="phone" type="tel"
                       placeholder="  9876543210" required maxlength="10" autocomplete="tel" />
              </div>
              <span class="iht-form-error" id="err_phone" role="alert"></span>
            </div>
            <div class="iht-form-group">
              <label class="iht-form-label" for="cf_email">Email <span class="iht-opt">(optional)</span></label>
              <input class="iht-form-input" id="cf_email" name="email" type="email"
                     placeholder="you@email.com" autocomplete="email" />
              <span class="iht-form-error" id="err_email" role="alert"></span>
            </div>
          </div>

          <div class="iht-form-group">
            <label class="iht-form-label" for="cf_city">City <span class="req">*</span></label>
            <input class="iht-form-input" id="cf_city" name="city" type="text"
                   placeholder="e.g. Delhi, Mumbai, Ludhiana" required autocomplete="address-level2" />
            <span class="iht-form-error" id="err_city" role="alert"></span>
          </div>

          <div class="iht-nav-center">
            <button type="button" class="iht-popup-btn iht-btn-primary iht-btn-wide" id="ihtStep1Next">
              Next
              <svg viewBox="0 0 20 20" fill="currentColor" width="15" height="15" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.3 4.3a1 1 0 0 1 1.4 0l5 5a1 1 0 0 1 0 1.4l-5 5a1 1 0 0 1-1.4-1.4L12.6 10 8.3 5.7a1 1 0 0 1 0-1.4Z"/>
              </svg>
            </button>
          </div>
        </fieldset>

        <!-- ====== STEP 2 ====== -->
        <fieldset class="iht-popup-fieldset" id="ihtStep2" hidden>
          <legend class="iht-popup-legend">Help us understand your hair concern</legend>

          <div class="iht-form-group">
            <label class="iht-form-label">I am interested in</label>
            <div class="iht-concern-grid" role="group" aria-label="Select your treatment interest">
              <label class="iht-concern-card">
                <input type="radio" name="concern" value="hair-transplant" />
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 3c-4.4 0-8 2.7-8 7 0 2.5 1.3 4.6 3.3 6H7v2h10v-2h-.3C18.7 14.6 20 12.5 20 10c0-4.3-3.6-7-8-7Z"/><path d="M10 19v2M14 19v2"/></svg>
                Hair Transplant
              </label>
              <label class="iht-concern-card">
                <input type="radio" name="concern" value="hair-loss" />
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M9 12s1-2 3-2 3 2 3 2"/><path d="M9 9.5v.01M15 9.5v.01"/></svg>
                Hair Loss Treatment
              </label>
              <label class="iht-concern-card">
                <input type="radio" name="concern" value="prp-gfc" />
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2v-4M9 21H5a2 2 0 0 1-2-2v-4m0 0h18"/></svg>
                PRP / GFC
              </label>
              <label class="iht-concern-card">
                <input type="radio" name="concern" value="not-sure" />
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.1 9a3 3 0 0 1 5.8 1c0 2-3 3-3 3M12 17h.01"/></svg>
                Not Sure
              </label>
            </div>
          </div>

          <div class="iht-form-row2">
            <div class="iht-form-group">
              <label class="iht-form-label" for="cf_grade">Hair Loss Stage</label>
              <select class="iht-form-input iht-select" id="cf_grade" name="grade">
                <option value="">Not sure — need doctor's advice</option>
                <option value="early">Early thinning</option>
                <option value="moderate">Visible thinning / hairline recession</option>
                <option value="advanced">Advanced hair loss</option>
                <option value="severe">Large bald area</option>
              </select>
            </div>
            <div class="iht-form-group">
              <label class="iht-form-label" for="cf_time">Best Time to Call</label>
              <select class="iht-form-input iht-select" id="cf_time" name="preferred_time">
                <option value="">Any time</option>
                <option value="morning">10 AM – 12 PM</option>
                <option value="afternoon1">12 PM – 3 PM</option>
                <option value="afternoon2">3 PM – 6 PM</option>
                <option value="evening">6 PM – 8 PM</option>
              </select>
            </div>
          </div>

          <span class="iht-form-error" id="err_submit" role="alert"></span>
          <div class="iht-popup-nav">
            <button type="button" class="iht-popup-btn iht-btn-ghost" id="ihtStep2Back">
              <svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14" aria-hidden="true"><path fill-rule="evenodd" d="M11.7 15.7a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 0-1.4l5-5a1 1 0 0 1 1.4 1.4L7.4 10l4.3 4.3a1 1 0 0 1 0 1.4Z"/></svg>
              Back
            </button>
            <button type="submit" class="iht-popup-btn iht-btn-submit" id="ihtFormSubmit">
              <span class="submit-text">Continue</span>
              <span class="submit-spinner" hidden aria-hidden="true"></span>
            </button>
          </div>
        </fieldset>

        <!-- ====== SUCCESS ====== -->
        <div class="iht-popup-success" id="ihtPopupSuccess" hidden role="status">
          <div class="success-icon" aria-hidden="true">
            <svg viewBox="0 0 52 52" fill="none">
              <circle cx="26" cy="26" r="24" fill="rgba(34,197,94,.12)" stroke="#22c55e" stroke-width="2"/>
              <path d="M15 26l8 8 14-16" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="success-heading">Request Received!</h3>
          <p class="success-msg">Thank you, <strong id="successName"></strong>. Our team will call you within <strong>24 hours</strong>.</p>
          <a class="iht-wa-btn" id="ihtWaBtn" href="#" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M17.5 14.4c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.2-.7.9-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.6-2.1-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.2-.5 0-.2-.1-.4-.2-.5-.1-.2-.6-1.5-.9-2-.2-.5-.5-.5-.7-.5h-.6c-.2 0-.5.1-.7.3C7.5 8 7 9 7 10.2c0 1.2.9 2.4 1 2.6.1.2 1.7 2.6 4.1 3.6.6.2 1 .4 1.4.5.6.2 1.1.2 1.5.1.5-.1 1.7-.7 1.9-1.4.2-.6.2-1.1.1-1.2-.1-.1-.3-.2-.6-.3Zm-5.5 7.6A9.9 9.9 0 0 1 7.1 20l-.3-.2-3.2.8.9-3.1-.2-.3A9.9 9.9 0 1 1 12 22Z"/></svg>
            Chat on WhatsApp
          </a>
          <button type="button" class="iht-popup-btn iht-btn-ghost" onclick="ihtPopup.close()">Close</button>
        </div>

      </form>
    </div><!-- /right -->

  </div><!-- /popup -->
</div><!-- /backdrop -->