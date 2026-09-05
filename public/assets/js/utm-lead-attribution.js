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

  var SEARCH_SOURCES = ['google', 'bing', 'yahoo', 'duckduckgo', 'baidu', 'yandex', 'ecosia', 'ask', 'aol'];
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

  function getReferrerHost(referrer) {
    if (!referrer) {
      return '';
    }
    try {
      return String(new URL(referrer).hostname || '').toLowerCase();
    } catch (e) {
      return '';
    }
  }

  function isOwnHost(host) {
    if (!host) {
      return false;
    }
    var current = String(window.location.hostname || '').toLowerCase();
    if (!current) {
      return false;
    }
    return host === current ||
      host === 'www.' + current ||
      'www.' + host === current;
  }

  function matchSearchEngine(host, referrer) {
    var lowerRef = String(referrer || '').toLowerCase();
    if (lowerRef.indexOf('android-app://com.google.android.googlequicksearchbox') === 0) {
      return 'google';
    }
    if (!host) {
      return '';
    }
    if (/(^|\.)google\.(com(\.[a-z]{2})?|co\.[a-z]{2}|[a-z]{2})$/.test(host)) {
      return 'google';
    }
    if (/(^|\.)bing\.com$/.test(host)) {
      return 'bing';
    }
    if (/(^|\.)yahoo\.(com|co\.[a-z]{2})$/.test(host)) {
      return 'yahoo';
    }
    if (/(^|\.)duckduckgo\.com$/.test(host)) {
      return 'duckduckgo';
    }
    if (/(^|\.)baidu\.com$/.test(host)) {
      return 'baidu';
    }
    if (/(^|\.)yandex\.(com|ru)$/.test(host)) {
      return 'yandex';
    }
    if (/(^|\.)ecosia\.org$/.test(host)) {
      return 'ecosia';
    }
    if (/(^|\.)ask\.com$/.test(host)) {
      return 'ask';
    }
    if (/(^|\.)aol\.com$/.test(host)) {
      return 'aol';
    }
    return '';
  }

  function matchSocialNetwork(host) {
    if (!host) {
      return '';
    }
    if (/(^|\.)(facebook\.com|fb\.com|fb\.me)$/.test(host)) {
      return 'facebook';
    }
    if (/(^|\.)instagram\.com$/.test(host)) {
      return 'instagram';
    }
    if (/(^|\.)(twitter\.com|t\.co|x\.com)$/.test(host)) {
      return 'twitter';
    }
    if (/(^|\.)linkedin\.com$/.test(host)) {
      return 'linkedin';
    }
    if (/(^|\.)tiktok\.com$/.test(host)) {
      return 'tiktok';
    }
    if (/(^|\.)(youtube\.com|youtu\.be)$/.test(host)) {
      return 'youtube';
    }
    if (/(^|\.)pinterest\.com$/.test(host)) {
      return 'pinterest';
    }
    if (/(^|\.)snapchat\.com$/.test(host)) {
      return 'snapchat';
    }
    return '';
  }

  /**
   * Infer source/medium from document.referrer when the URL has no UTMs.
   * Search engines → organic, social → social, other hosts → referral, none → direct.
   */
  function inferAttributionFromReferrer(referrer) {
    if (!referrer) {
      return { source: 'direct', medium: 'none' };
    }

    var host = getReferrerHost(referrer);
    if (!host && String(referrer).toLowerCase().indexOf('android-app://com.google.android.googlequicksearchbox') !== 0) {
      return { source: 'direct', medium: 'none' };
    }

    if (isOwnHost(host)) {
      return { source: 'direct', medium: 'none' };
    }

    var search = matchSearchEngine(host, referrer);
    if (search) {
      return { source: search, medium: 'organic' };
    }

    var social = matchSocialNetwork(host);
    if (social) {
      return { source: social, medium: 'social' };
    }

    return {
      source: host.replace(/^www\./, ''),
      medium: 'referral'
    };
  }

  /**
   * Resolve source from utm_source, then gclid → google, then fbclid → facebook,
   * then document.referrer (organic/social/referral/direct).
   */
  function resolveSource(params, referrer) {
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
    if (hasGoogleOrganicUrlSignal()) {
      return 'google';
    }
    return inferAttributionFromReferrer(referrer).source;
  }

  /**
   * Resolve medium from utm_medium, then cpc when a paid click-id is present,
   * then document.referrer.
   */
  function resolveMedium(params, referrer) {
    params = params || {};
    if (isNonEmpty(params.utm_medium)) {
      return String(params.utm_medium);
    }
    if (isNonEmpty(params.gclid) || isNonEmpty(params.fbclid)) {
      return 'cpc';
    }
    if (hasGoogleOrganicUrlSignal()) {
      return 'organic';
    }
    return inferAttributionFromReferrer(referrer).medium;
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
      return 'organic';
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

    if (src === 'direct' || src === '(direct)' || med === 'none' || med === '(none)') {
      return 'direct';
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

  /**
   * Direct / empty source is a fallback (missing referrer), not a locked acquisition.
   * A later Google organic / UTM / click-id hit may replace it. Real sources never overwrite.
   */
  function isPlaceholderSource(source) {
    var src = String(source || '').toLowerCase();
    return src === '' || src === 'direct' || src === '(direct)';
  }

  function isLockedFirstTouch(data) {
    return !!(data && !isPlaceholderSource(data.first_touch_source));
  }

  function remapLegacyOrganicChannel(data) {
    if (!data) {
      return data;
    }
    if (String(data.first_touch_medium || '').toLowerCase() === 'organic' &&
        data.first_touch_channel === 'organic_search') {
      data.first_touch_channel = 'organic';
    }
    if (String(data.last_touch_medium || '').toLowerCase() === 'organic' &&
        data.last_touch_channel === 'organic_search') {
      data.last_touch_channel = 'organic';
    }
    return data;
  }

  function hasGoogleOrganicUrlSignal() {
    try {
      return isNonEmpty(new URLSearchParams(window.location.search).get('srsltid'));
    } catch (e) {
      return false;
    }
  }

  function canonicalPageUrl(href) {
    if (!href) {
      return '';
    }
    try {
      var u = new URL(href, window.location.origin);
      u.hash = '';
      return u.toString();
    } catch (e) {
      return String(href);
    }
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
    var source = resolveSource(params, referrer);
    var medium = resolveMedium(params, referrer);
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
   * Persist first-touch once (UTM / click-ID / referrer). Direct is a fallback and
   * can be upgraded by a later real source. Real first-touch is never overwritten.
   * landing_page / first_touch_landing_page stay the first page of the journey.
   */
  function captureAttribution() {
    var urlParams = getUrlAttributionParams() || {};
    var hasUrlAttribution = false;
    var key;
    for (key in urlParams) {
      if (Object.prototype.hasOwnProperty.call(urlParams, key) && isNonEmpty(urlParams[key])) {
        hasUrlAttribution = true;
        break;
      }
    }

    var existing = getLeadAttributionCookie() || {};
    var now = new Date().toISOString();
    var pageUrl = canonicalPageUrl(window.location.href);
    var referrer = document.referrer || '';
    var currentSource = resolveSource(urlParams, referrer);
    var currentIsReal = !isPlaceholderSource(currentSource);

    // A real first-touch (google/facebook/UTM/etc.) is never overwritten.
    // Direct is only a fallback, so a later real acquisition can replace it.
    if (isLockedFirstTouch(existing) && !hasUrlAttribution) {
      setLeadAttributionCookie(remapLegacyOrganicChannel(copyObject(existing)));
      return;
    }

    var attribution = copyObject(existing);

    if (!isLockedFirstTouch(existing)) {
      attribution.utm_source = firstNonEmpty(existing.utm_source, urlParams.utm_source);
      attribution.utm_medium = firstNonEmpty(existing.utm_medium, urlParams.utm_medium);
      attribution.utm_campaign = firstNonEmpty(existing.utm_campaign, urlParams.utm_campaign);
      attribution.utm_content = firstNonEmpty(existing.utm_content, urlParams.utm_content);
      attribution.utm_term = firstNonEmpty(existing.utm_term, urlParams.utm_term);
      attribution.gclid = firstNonEmpty(existing.gclid, urlParams.gclid);
      attribution.fbclid = firstNonEmpty(existing.fbclid, urlParams.fbclid);
      attribution.campaign_id = firstNonEmpty(existing.campaign_id, urlParams.campaign_id);
    }

    attribution.landing_page = firstNonEmpty(existing.landing_page, pageUrl);
    attribution.referrer = firstNonEmpty(existing.referrer, referrer);
    attribution.first_visit_time = firstNonEmpty(existing.first_visit_time, now);

    var firstLanding = firstNonEmpty(
      existing.first_touch_landing_page,
      existing.landing_page,
      pageUrl
    );
    var firstAt = firstNonEmpty(existing.first_touch_at, existing.first_visit_time, now);

    if (!isLockedFirstTouch(existing) && (currentIsReal || !hasFirstTouch(existing))) {
      applyFirstTouch(attribution, buildTouch(
        {
          utm_source: firstNonEmpty(urlParams.utm_source),
          utm_medium: firstNonEmpty(urlParams.utm_medium),
          utm_campaign: firstNonEmpty(urlParams.utm_campaign, existing.utm_campaign),
          gclid: firstNonEmpty(urlParams.gclid, existing.gclid),
          fbclid: firstNonEmpty(urlParams.fbclid, existing.fbclid)
        },
        firstLanding,
        referrer || existing.referrer || '',
        firstAt
      ));
      attribution.utm_source = firstNonEmpty(urlParams.utm_source, attribution.first_touch_source, existing.utm_source);
      attribution.utm_medium = firstNonEmpty(urlParams.utm_medium, attribution.first_touch_medium, existing.utm_medium);
    } else {
      preserveFirstTouch(attribution, existing);
      remapLegacyOrganicChannel(attribution);
    }

    if (hasUrlAttribution) {
      applyLastTouch(attribution, buildTouch(urlParams, pageUrl, referrer, now));
    } else if (!isLockedFirstTouch(existing)) {
      applyLastTouch(attribution, buildTouch(
        {
          utm_source: attribution.utm_source,
          utm_medium: attribution.utm_medium,
          utm_campaign: attribution.utm_campaign,
          gclid: attribution.gclid,
          fbclid: attribution.fbclid
        },
        pageUrl,
        referrer,
        now
      ));
    }

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
