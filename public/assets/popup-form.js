/**
 * IHT POPUP — popup-form.js  v5
 * /assets/popup-form.js
 */
(function () {
  'use strict';

  var WA = '919779944207';

  var backdrop  = document.getElementById('ihtPopupBackdrop');
  if (!backdrop) return;

  var closeBtn  = document.getElementById('ihtPopupClose');
  var form      = document.getElementById('ihtConsultForm');
  var step1     = document.getElementById('ihtStep1');
  var step2     = document.getElementById('ihtStep2');
  var success   = document.getElementById('ihtPopupSuccess');
  var floatBtn  = document.querySelector('.iht-float-cta');
  var stepEls   = document.querySelectorAll('.iht-popup-step');
  var lineEls   = document.querySelectorAll('.step-line');
  var waBtn     = document.getElementById('ihtWaBtn');
  var saved     = false;
  var savedName = '';

  /* ---- OPEN / CLOSE ---- */
  function open() {
    backdrop.classList.add('is-open');
    backdrop.setAttribute('aria-hidden', 'false');
    document.body.classList.add('iht-popup-open');
    goToStep(1);
    saved = false; // reset so re-open sends fresh lead
    setTimeout(function () {
      var f = step1 && step1.querySelector('input');
      if (f) f.focus();
    }, 280);
  }

  function close() {
    backdrop.classList.remove('is-open');
    backdrop.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('iht-popup-open');
  }

  /* ---- STEP SWITCH ---- */
  function goToStep(n) {
    if (step1) step1.hidden = (n !== 1);
    if (step2) step2.hidden = (n !== 2);
    if (success) success.hidden = true;

    stepEls.forEach(function (el) {
      var s = parseInt(el.getAttribute('data-step'), 10);
      el.classList.toggle('active', s === n);
      el.classList.toggle('done',   s < n);
    });
    lineEls.forEach(function (ln, i) {
      ln.classList.toggle('done', i + 1 < n);
    });

    /* Scroll right panel to top on mobile */
    var right = document.querySelector('.iht-popup-right');
    if (right) right.scrollTop = 0;
  }

  /* ---- COLLECT DATA ---- */
  function concernLabel() {
    var concern = document.querySelector('input[name="concern"]:checked');
    var labels = {
      'hair-transplant': 'Hair Transplant',
      'hair-loss': 'Hair Loss Treatment',
      'prp-gfc': 'PRP / GFC',
      'not-sure': 'Not Sure'
    };
    if (!concern || !concern.value) return 'Hair Consultation';
    return labels[concern.value] || concern.value;
  }

  function selectedText(id) {
    var el = document.getElementById(id);
    if (!el || !el.value || el.selectedIndex < 0) return '';
    return (el.options[el.selectedIndex].text || '').trim();
  }

  function getAttribution() {
    return (typeof window.getLeadAttributionCookie === 'function')
      ? (window.getLeadAttributionCookie() || {})
      : {};
  }

  function getData(full) {
    var a = getAttribution();
    var phone = v('cf_phone').replace(/\D/g, '');
    var procedure = full ? concernLabel() : 'Hair Consultation';
    var gradeText = full ? selectedText('cf_grade') : '';
    var timeText = full ? selectedText('cf_time') : '';
    var messageParts = [];
    if (gradeText) messageParts.push('Hair Loss Stage: ' + gradeText);
    if (timeText) messageParts.push('Best Time to Call: ' + timeText);

    return {
      name: v('cf_name'),
      email: v('cf_email'),
      phone: phone,
      city: v('cf_city'),
      concern: procedure,
      procedure_name: procedure,
      procedure_category_id: null,
      message: messageParts.join(' | '),
      grade: gradeText,
      preferred_time: timeText,
      source_url: window.location.href,
      source_id: 'website',
      campaign_id: a.campaign_id || null,
      campaign_name: a.campaign_name || a.utm_campaign || null,
      ad_id: a.ad_id || '',
      ad_name: a.ad_name || '',
      form_id: 'website-popup-form',
      form_name: (document.title || 'Consultation Popup').trim(),
      utm_source: a.utm_source || '',
      utm_medium: a.utm_medium || '',
      utm_campaign: a.utm_campaign || '',
      utm_content: a.utm_content || '',
      utm_term: a.utm_term || '',
      gclid: a.gclid || '',
      fbclid: a.fbclid || '',
      landing_page: a.landing_page || window.location.href,
      referrer: a.referrer || document.referrer || '',
      first_touch_source: a.first_touch_source || null,
      first_touch_medium: a.first_touch_medium || null,
      first_touch_channel: a.first_touch_channel || null,
      first_touch_campaign: a.first_touch_campaign || null,
      first_touch_referrer: a.first_touch_referrer || null,
      first_touch_landing_page: a.first_touch_landing_page || null,
      first_touch_at: a.first_touch_at || null,
      last_touch_source: a.last_touch_source || null,
      last_touch_medium: a.last_touch_medium || null,
      last_touch_channel: a.last_touch_channel || null,
      last_touch_campaign: a.last_touch_campaign || null,
      last_touch_referrer: a.last_touch_referrer || null,
      last_touch_landing_page: a.last_touch_landing_page || null,
      last_touch_at: a.last_touch_at || null
    };
  }

  /* ---- SEND TO SERVER (same CRM API as Book a Consultation) ---- */
  function submitUrl() {
    var url = window.CONTACT_SUBMIT_URL || '';
    try {
      var parsed = new URL(url, window.location.origin);
      if (parsed.origin === window.location.origin) {
        return url;
      }
      return parsed.pathname + parsed.search;
    } catch (e) {
      return url;
    }
  }

  function sendLead(data) {
    var url = submitUrl();
    return fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(function (r) {
      return r.text().then(function (text) {
        var payload = {};
        try { payload = text ? JSON.parse(text) : {}; } catch (e) { payload = {}; }
        if (typeof payload !== 'object' || payload === null) payload = {};
        if (payload.status === undefined && !r.ok) {
          payload.status = false;
          payload.message = payload.message || 'Something went wrong.';
        }
        return payload;
      });
    });
  }

  /* ---- SUCCESS SCREEN ---- */
  function showSuccess(name) {
    if (step1) step1.hidden = true;
    if (step2) step2.hidden = true;
    stepEls.forEach(function (el) {
      el.classList.remove('active'); el.classList.add('done');
    });
    lineEls.forEach(function (ln) { ln.classList.add('done'); });

    var nameEl = document.getElementById('successName');
    if (nameEl) nameEl.textContent = name;

    if (waBtn) {
      waBtn.href = 'https://wa.me/' + WA + '?text=' + encodeURIComponent(
        'Hi IHT! I just submitted a consultation request. My name is ' + name + '. Please guide me.'
      );
    }
    if (success) success.hidden = false;
  }

  /* ---- VALIDATION ---- */
  function err(inputId, errId, msg) {
    if (inputId) {
      var el = document.getElementById(inputId);
      if (el) el.classList.toggle('has-error', !!msg);
    }
    var e = document.getElementById(errId);
    if (e) e.textContent = msg || '';
    return !!msg;
  }

  function validateStep1() {
    var ok   = true;
    var name = document.getElementById('cf_name');
    var ph   = document.getElementById('cf_phone');
    var em   = document.getElementById('cf_email');
    var city = document.getElementById('cf_city');

    if (!name || name.value.trim().length < 3 || !/^[A-Za-z ]+$/.test(name.value.trim())) {
      err('cf_name', 'err_name', 'Please enter your full name.'); ok = false;
    } else { err('cf_name', 'err_name', ''); }

    var pv = ph ? ph.value.replace(/\D/g, '') : '';
    if (!/^[6-9]\d{9}$/.test(pv)) {
      err('cf_phone', 'err_phone', 'Enter a valid 10-digit mobile number.'); ok = false;
    } else { err('cf_phone', 'err_phone', ''); }

    if (em && em.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value.trim())) {
      err('cf_email', 'err_email', 'Invalid email address.'); ok = false;
    } else { err('cf_email', 'err_email', ''); }

    if (!city || !city.value.trim()) {
      err('cf_city', 'err_city', 'Please enter your city.'); ok = false;
    } else { err('cf_city', 'err_city', ''); }

    return ok;
  }

  /* ---- STEP 1 NEXT — save lead immediately so CRM gets the contact even if step 2 is abandoned ---- */
  var s1n = document.getElementById('ihtStep1Next');
  if (s1n) s1n.addEventListener('click', function () {
    if (!validateStep1()) return;
    savedName = v('cf_name');
    if (!saved) {
      saved = true;
      sendLead(getData(false)).catch(function () { saved = false; });
    }
    goToStep(2);
  });

  /* ---- STEP 2 BACK ---- */
  var s2b = document.getElementById('ihtStep2Back');
  if (s2b) s2b.addEventListener('click', function () { goToStep(1); });

  /* ---- STEP 2 SUBMIT — send full data ---- */
  if (form) form.addEventListener('submit', function (e) {
    e.preventDefault();
    var btn   = document.getElementById('ihtFormSubmit');
    var txt   = btn && btn.querySelector('.submit-text');
    var spin  = btn && btn.querySelector('.submit-spinner');

    if (btn)  btn.disabled = true;
    if (txt)  txt.hidden   = true;
    if (spin) spin.hidden  = false;

    err(null, 'err_submit', '');

    sendLead(getData(true))
      .then(function (res) {
        if (res && res.status) {
          saved = true;
          if (btn)  btn.disabled = false;
          if (txt)  txt.hidden   = false;
          if (spin) spin.hidden  = true;
          showSuccess(savedName || v('cf_name'));
          return;
        }
        if (btn)  btn.disabled = false;
        if (txt)  txt.hidden   = false;
        if (spin) spin.hidden  = true;
        err(null, 'err_submit', (res && res.message) || 'Something went wrong. Please try again.');
      })
      .catch(function () {
        if (btn)  btn.disabled = false;
        if (txt)  txt.hidden   = false;
        if (spin) spin.hidden  = true;
        err(null, 'err_submit', 'Something went wrong. Please try again.');
      });
  });

  /* ---- CONCERN CARD FALLBACK ---- */
  document.querySelectorAll('.iht-concern-card').forEach(function (card) {
    var radio = card.querySelector('input[type="radio"]');
    if (!radio) return;
    radio.addEventListener('change', function () {
      document.querySelectorAll('.iht-concern-card').forEach(function (c) { c.classList.remove('selected'); });
      card.classList.add('selected');
    });
  });

  /* ---- LIVE VALIDATION ---- */
  var rules = {
    cf_name:  { e: 'err_name',  fn: function (x) { return x.trim().length >= 3 && /^[A-Za-z ]+$/.test(x.trim()) ? '' : 'Please enter your full name.'; } },
    cf_phone: { e: 'err_phone', fn: function (x) { return /^[6-9]\d{9}$/.test(x.replace(/\D/g,'')) ? '' : 'Enter a valid 10-digit number.'; } },
    cf_email: { e: 'err_email', fn: function (x) { return !x || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(x) ? '' : 'Invalid email.'; } },
    cf_city:  { e: 'err_city',  fn: function (x) { return x.trim() ? '' : 'Please enter your city.'; } },
  };
  Object.keys(rules).forEach(function (id) {
    var el = document.getElementById(id);
    if (!el) return;
    var r = rules[id];
    el.addEventListener('blur', function () { err(id, r.e, r.fn(el.value)); });
    el.addEventListener('input', function () { if (el.classList.contains('has-error')) err(id, r.e, r.fn(el.value)); });
  });

  /* ---- EVENTS ---- */
  backdrop.addEventListener('click', function (e) { if (e.target === backdrop) close(); });
  if (closeBtn) closeBtn.addEventListener('click', close);
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && backdrop.classList.contains('is-open')) close();
  });
  document.querySelectorAll('[data-popup="consult"]').forEach(function (el) {
    el.addEventListener('click', function (e) { e.preventDefault(); open(); });
  });
  if (floatBtn) floatBtn.addEventListener('click', open);

  /* ---- FLOAT CTA on scroll ---- */
  if (floatBtn) {
    var ticking = false;
    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(function () {
          floatBtn.classList.toggle('is-visible', window.scrollY > 400);
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }

  /* ---- INIT ---- */
  goToStep(1);
  window.ihtPopup = { open: open, close: close };

  function v(id) { var el = document.getElementById(id); return el ? el.value.trim() : ''; }

})();