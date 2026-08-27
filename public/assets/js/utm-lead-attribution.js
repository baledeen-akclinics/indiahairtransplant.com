/**
 * Lead Attribution System
 * First-touch + last-touch UTM / click-ID capture → cookie → form hidden fields
 */
(function () {
  'use strict';

  if (window.__leadAttributionInit) {
    return;
  }
  window.__leadAttributionInit = true;

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
    'fbclid',
    'campaign_id'
  ];
  var FIRST_TOUCH_FIELDS = [
    'first_touch_source',
    'first_touch_medium',
    'first_touch_channel',
    'first_touch_campaign',
    'first_touch_referrer',
    'first_touch_landing_page',
    'first_touch_at'
  ];
  var LAST_TOUCH_FIELDS = [
    'last_touch_source',
    'last_touch_medium',
    'last_touch_channel',
    'last_touch_campaign',
    'last_touch_referrer',
    'last_touch_landing_page',
    'last_touch_at'
  ];
  var FORM_FIELDS = [
    'utm_source',
    'utm_medium',
    'utm_campaign',
    'utm_content',
    'utm_term',
    'gclid',
    'fbclid',
    'landing_page',
    'referrer'
  ].concat(FIRST_TOUCH_FIELDS, LAST_TOUCH_FIELDS);

  var SEARCH_SOURCES = ['google', 'bing', 'yahoo', 'duckduckgo'];
  var SOCIAL_SOURCES = [
    'facebook', 'fb', 'instagram', 'ig', 'meta', 'an', 'messenger',
    'twitter', 'x', 'linkedin', 'tiktok', 'pinterest', 'snapchat', 'youtube'
  ];
  var PAID_SEARCH_MEDIUMS = ['cpc', 'ppc', 'paidsearch', 'paid_search', 'paid-search'];
  var PAID_SOCIAL_MEDIUMS = ['paid', 'cpc', 'ppc', 'paid_social', 'paidsocial', 'paid-social'];

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

  window.setLeadAttributionCookie = setLeadAttributionCookie;
  window.getLeadAttributionCookie = getLeadAttributionCookie;

  // ============================================================
  // Helpers
  // ============================================================

  function isNonEmpty(value) {
    return value !== undefined && value !== null && String(value) !== '';
  }

  function firstNonEmpty() {
    for (var i = 0; i < arguments.length; i++) {
      if (isNonEmpty(arguments[i])) {
        return String(arguments[i]);
      }
    }
    return '';
  }

  function includesValue(list, value) {
    return list.indexOf(value) !== -1;
  }

  function copyObject(source) {
    var out = {};
    if (!source) {
      return out;
    }
    for (var key in source) {
      if (Object.prototype.hasOwnProperty.call(source, key)) {
        out[key] = source[key];
      }
    }
    return out;
  }

  /**
   * Resolve source from utm_source, then gclid → google, then fbclid → facebook.
   */
  function resolveSource(params) {
    params = params || {};
    if (isNonEmpty(params.utm_source)) {
      return String(params.utm_source);
    }
    if (isNonEmpty(params.gclid)) {
      return 'google';
    }
    if (isNonEmpty(params.fbclid)) {
      return 'facebook';
    }
    return '';
  }

  /**
   * Resolve medium from utm_medium, then cpc when a paid click-id is present.
   */
  function resolveMedium(params) {
    params = params || {};
    if (isNonEmpty(params.utm_medium)) {
      return String(params.utm_medium);
    }
    if (isNonEmpty(params.gclid) || isNonEmpty(params.fbclid)) {
      return 'cpc';
    }
    return '';
  }

  /**
   * Map source + medium (+ click IDs) to a channel.
   */
  function detectChannel(source, medium, clickIds) {
    var src = String(source || '').toLowerCase();
    var med = String(medium || '').toLowerCase();
    clickIds = clickIds || {};

    var isSearch = includesValue(SEARCH_SOURCES, src);
    var isSocial = includesValue(SOCIAL_SOURCES, src);

    if (isSearch && includesValue(PAID_SEARCH_MEDIUMS, med)) {
      return 'paid_search';
    }

    if (isSocial && includesValue(PAID_SOCIAL_MEDIUMS, med)) {
      return 'paid_social';
    }

    if (isNonEmpty(clickIds.gclid) && (isSearch || src === '')) {
      return 'paid_search';
    }

    if (isNonEmpty(clickIds.fbclid) && (isSocial || src === '')) {
      return 'paid_social';
    }

    if (med === 'organic' || med === 'seo') {
      return isSearch ? 'organic_search' : 'organic';
    }

    if (med === 'social' || med === 'organic_social' || med === 'organicsocial') {
      return 'organic_social';
    }

    if (med === 'email' || src === 'email') {
      return 'email';
    }

    if (med === 'affiliate') {
      return 'affiliate';
    }

    if (med === 'referral') {
      return 'referral';
    }

    if (med === 'display' || med === 'banner') {
      return 'display';
    }

    if (med !== '') {
      return med;
    }

    if (src !== '') {
      return 'referral';
    }

    return 'direct';
  }

  function hasFirstTouch(data) {
    if (!data) {
      return false;
    }
    for (var i = 0; i < FIRST_TOUCH_FIELDS.length; i++) {
      if (isNonEmpty(data[FIRST_TOUCH_FIELDS[i]])) {
        return true;
      }
    }
    return false;
  }

  function preserveFirstTouch(attribution, existing) {
    for (var i = 0; i < FIRST_TOUCH_FIELDS.length; i++) {
      var key = FIRST_TOUCH_FIELDS[i];
      attribution[key] = existing[key];
    }
  }

  function applyFirstTouch(attribution, touch) {
    attribution.first_touch_source = touch.source;
    attribution.first_touch_medium = touch.medium;
    attribution.first_touch_channel = touch.channel;
    attribution.first_touch_campaign = touch.campaign;
    attribution.first_touch_referrer = touch.referrer;
    attribution.first_touch_landing_page = touch.landingPage;
    attribution.first_touch_at = touch.at;
  }

  function applyLastTouch(attribution, touch) {
    attribution.last_touch_source = touch.source;
    attribution.last_touch_medium = touch.medium;
    attribution.last_touch_channel = touch.channel;
    attribution.last_touch_campaign = touch.campaign;
    attribution.last_touch_referrer = touch.referrer;
    attribution.last_touch_landing_page = touch.landingPage;
    attribution.last_touch_at = touch.at;
  }

  function buildTouch(params, pageUrl, referrer, at) {
    var source = resolveSource(params);
    var medium = resolveMedium(params);
    return {
      source: source,
      medium: medium,
      channel: detectChannel(source, medium, params),
      campaign: firstNonEmpty(params.utm_campaign),
      referrer: referrer || '',
      landingPage: pageUrl || '',
      at: at
    };
  }

  // ============================================================
  // Capture attribution on page load (first-touch + last-touch)
  // ============================================================

  /**
   * Read UTM / click-ID params from the current URL.
   * @returns {Object} Key/value map of present attribution params, or null
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

    return hasAny ? data : null;
  }

  /**
   * Persist first-touch once and refresh last-touch whenever the URL
   * contains attribution parameters. Never overwrites first-touch values.
   * Legacy cookies without first/last-touch keys are preserved and backfilled
   * on the next attributed visit.
   */
  function captureAttribution() {
    var urlParams = getUrlAttributionParams();
    if (!urlParams) {
      return;
    }

    var existing = getLeadAttributionCookie() || {};
    var attribution = copyObject(existing);
    var now = new Date().toISOString();
    var pageUrl = window.location.href;
    var referrer = document.referrer || '';

    // Legacy first-touch fields: set only when missing so old cookies stay intact
    attribution.utm_source = firstNonEmpty(existing.utm_source, urlParams.utm_source);
    attribution.utm_medium = firstNonEmpty(existing.utm_medium, urlParams.utm_medium);
    attribution.utm_campaign = firstNonEmpty(existing.utm_campaign, urlParams.utm_campaign);
    attribution.utm_content = firstNonEmpty(existing.utm_content, urlParams.utm_content);
    attribution.utm_term = firstNonEmpty(existing.utm_term, urlParams.utm_term);
    attribution.gclid = firstNonEmpty(existing.gclid, urlParams.gclid);
    attribution.fbclid = firstNonEmpty(existing.fbclid, urlParams.fbclid);
    attribution.campaign_id = firstNonEmpty(existing.campaign_id, urlParams.campaign_id);
    attribution.landing_page = firstNonEmpty(existing.landing_page, pageUrl);
    attribution.referrer = firstNonEmpty(existing.referrer, referrer);
    attribution.first_visit_time = firstNonEmpty(existing.first_visit_time, now);

    if (!hasFirstTouch(existing)) {
      var firstParams = {
        utm_source: firstNonEmpty(existing.utm_source, urlParams.utm_source),
        utm_medium: firstNonEmpty(existing.utm_medium, urlParams.utm_medium),
        utm_campaign: firstNonEmpty(existing.utm_campaign, urlParams.utm_campaign),
        gclid: firstNonEmpty(existing.gclid, urlParams.gclid),
        fbclid: firstNonEmpty(existing.fbclid, urlParams.fbclid)
      };
      applyFirstTouch(attribution, buildTouch(
        firstParams,
        firstNonEmpty(existing.landing_page, pageUrl),
        firstNonEmpty(existing.referrer, referrer),
        firstNonEmpty(existing.first_visit_time, now)
      ));
    } else {
      preserveFirstTouch(attribution, existing);
    }

    applyLastTouch(attribution, buildTouch(urlParams, pageUrl, referrer, now));

    setLeadAttributionCookie(attribution);
  }

  // ============================================================
  // Populate hidden form fields before submission
  // ============================================================

  function ensureHiddenField(form, fieldName) {
    var input =
      form.querySelector('[name="' + fieldName + '"]') ||
      form.querySelector('#' + fieldName);
    if (!input) {
      input = document.createElement('input');
      input.type = 'hidden';
      input.name = fieldName;
      input.id = fieldName;
      form.insertBefore(input, form.firstChild);
    }
    return input;
  }

  /**
   * Fill matching hidden inputs on a form from the attribution cookie.
   * Creates any missing first-touch / last-touch hidden fields.
   * @param {HTMLFormElement} form
   */
  function populateFormAttributionFields(form) {
    var data = getLeadAttributionCookie();
    if (!form) {
      return;
    }

    var i;
    for (i = 0; i < FIRST_TOUCH_FIELDS.length; i++) {
      ensureHiddenField(form, FIRST_TOUCH_FIELDS[i]);
    }
    for (i = 0; i < LAST_TOUCH_FIELDS.length; i++) {
      ensureHiddenField(form, LAST_TOUCH_FIELDS[i]);
    }

    if (!data) {
      return;
    }

    for (i = 0; i < FORM_FIELDS.length; i++) {
      var fieldName = FORM_FIELDS[i];
      if (typeof data[fieldName] === 'undefined') {
        continue;
      }
      var input =
        form.querySelector('[name="' + fieldName + '"]') ||
        form.querySelector('#' + fieldName);
      if (input) {
        input.value = data[fieldName];
      }
    }

    if (data.campaign_id) {
      var campaignIdInput =
        form.querySelector('[name="campaign_id"]') ||
        form.querySelector('#campaign_id');
      if (campaignIdInput) {
        campaignIdInput.value = data.campaign_id;
      }
    }

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

  captureAttribution();
  bindFormAttribution();
})();
