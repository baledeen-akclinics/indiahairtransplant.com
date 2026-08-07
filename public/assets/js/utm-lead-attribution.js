/**
 * Lead Attribution System
 * First-touch UTM / click-ID capture → cookie → form hidden fields
 */
(function () {
  'use strict';

  // ---- Configuration ----
  var COOKIE_NAME = 'lead_attribution';
  var COOKIE_DAYS = 30;
  var ATTRIBUTION_PARAMS = [
    'utm_source',
    'utm_medium',
    'utm_campaign',
    'utm_content',
    'utm_term',
    'gclid',
    'fbclid'
  ];
  // Hidden form fields that receive cookie values on submit
  var FORM_FIELDS = ATTRIBUTION_PARAMS.concat(['landing_page', 'referrer']);

  // ============================================================
  // Cookie helpers
  // ============================================================

  /**
   * Write the lead_attribution cookie (JSON payload, 30-day expiry).
   * @param {Object} data - Attribution object to store
   */
  function setLeadAttributionCookie(data) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (COOKIE_DAYS * 24 * 60 * 60 * 1000));
    var value = encodeURIComponent(JSON.stringify(data));
    document.cookie =
      COOKIE_NAME + '=' + value +
      '; expires=' + expires.toUTCString() +
      '; path=/' +
      '; SameSite=Lax';
  }

  /**
   * Read and parse the lead_attribution cookie.
   * @returns {Object|null} Parsed attribution data, or null if missing/invalid
   */
  function getLeadAttributionCookie() {
    var nameEQ = COOKIE_NAME + '=';
    var parts = document.cookie.split(';');
    for (var i = 0; i < parts.length; i++) {
      var c = parts[i].replace(/^\s+/, '');
      if (c.indexOf(nameEQ) === 0) {
        try {
          return JSON.parse(decodeURIComponent(c.substring(nameEQ.length)));
        } catch (e) {
          return null;
        }
      }
    }
    return null;
  }

  // Expose helpers globally for reuse elsewhere on the site
  window.setLeadAttributionCookie = setLeadAttributionCookie;
  window.getLeadAttributionCookie = getLeadAttributionCookie;

  // ============================================================
  // Capture attribution on page load (first-touch only)
  // ============================================================

  /**
   * Read UTM / click-ID params from the current URL.
   * @returns {Object} Key/value map of present attribution params
   */
  function getUrlAttributionParams() {
    var params = new URLSearchParams(window.location.search);
    var data = {};
    var hasAny = false;

    for (var i = 0; i < ATTRIBUTION_PARAMS.length; i++) {
      var key = ATTRIBUTION_PARAMS[i];
      var val = params.get(key);
      if (val !== null && val !== '') {
        data[key] = val;
        hasAny = true;
      }
    }
    console.log("URL UTM Data :", data);
    return hasAny ? data : null;
  }

  /**
   * Persist first-touch attribution when UTM/click-ID params are present
   * and no cookie exists yet. Never overwrites an existing cookie.
   */
  function captureFirstTouchAttribution() {
    // Preserve original first-touch values — do not overwrite
    if (getLeadAttributionCookie()) {
      return;
    }

    var urlParams = getUrlAttributionParams();
    if (!urlParams) {
      return;
    }

    var attribution = {
      utm_source: urlParams.utm_source || '',
      utm_medium: urlParams.utm_medium || '',
      utm_campaign: urlParams.utm_campaign || '',
      utm_content: urlParams.utm_content || '',
      utm_term: urlParams.utm_term || '',
      gclid: urlParams.gclid || '',
      fbclid: urlParams.fbclid || '',
      landing_page: window.location.href,
      referrer: document.referrer || '',
      first_visit_time: new Date().toISOString()
    };

    setLeadAttributionCookie(attribution);
  }

  // ============================================================
  // Populate hidden form fields before submission
  // ============================================================

  /**
   * Fill matching hidden inputs on a form from the attribution cookie.
   * Only sets fields that already exist in the form markup.
   * @param {HTMLFormElement} form
   */
  function populateFormAttributionFields(form) {
    var data = getLeadAttributionCookie();
    if (!data || !form) {
      return;
    }

    for (var i = 0; i < FORM_FIELDS.length; i++) {
      var fieldName = FORM_FIELDS[i];
      if (typeof data[fieldName] === 'undefined') {
        continue;
      }
      // Prefer name= match; fall back to id= for flexibility
      var input =
        form.querySelector('[name="' + fieldName + '"]') ||
        form.querySelector('#' + fieldName);
      if (input) {
        input.value = data[fieldName];
      }
    }

    // Map utm_campaign → campaign_name hidden field when present
    if (data.utm_campaign) {
      var campaignNameInput =
        form.querySelector('[name="campaign_name"]') ||
        form.querySelector('#campaign_name');
      if (campaignNameInput) {
        campaignNameInput.value = data.utm_campaign;
      }
    }
  }

  /**
   * Attach a capture-phase submit listener so attribution is injected
   * before any other submit handlers (works for every form on the page).
   */
  function bindFormAttribution() {
    document.addEventListener('submit', function (event) {
      var form = event.target;
      if (form && form.tagName === 'FORM') {
        populateFormAttributionFields(form);
      }
    }, true);
  }

  // ============================================================
  // Initialize on every page load
  // ============================================================
  captureFirstTouchAttribution();
  bindFormAttribution();
})();
