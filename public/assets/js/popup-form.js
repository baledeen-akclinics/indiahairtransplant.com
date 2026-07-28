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
  function getData(full) {
    var concern = document.querySelector('input[name="concern"]:checked');
    var o = {
      action:     full ? 'update_lead' : 'save_lead',
      name:       v('cf_name'),
      phone:      v('cf_phone'),
      email:      v('cf_email'),
      city:       v('cf_city'),
      source_url: window.location.href,
    };
    if (full) {
      o.concern        = concern ? concern.value : '';
      o.grade          = v('cf_grade');
      o.preferred_time = v('cf_time');
    }
    return o;
  }

  /* ---- SEND TO SERVER ---- */
  function sendLead(data) {
    fetch('/form-handler.php', {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify(data),
    })
    .then(function (r) { return r.json(); })
    .then(function (j) { console.log('[IHT] Lead sent:', j); })
    .catch(function (e) { console.error('[IHT] Lead send failed:', e); });
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

    if (!name || name.value.trim().length < 2) {
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

  /* ---- STEP 1 NEXT — auto-save lead immediately ---- */
  var s1n = document.getElementById('ihtStep1Next');
  if (s1n) s1n.addEventListener('click', function () {
    if (!validateStep1()) return;
    savedName = v('cf_name');
    if (!saved) { saved = true; sendLead(getData(false)); }
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

    sendLead(getData(true));

    setTimeout(function () {
      if (btn)  btn.disabled = false;
      if (txt)  txt.hidden   = false;
      if (spin) spin.hidden  = true;
      showSuccess(savedName || v('cf_name'));
    }, 700);
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
    cf_name:  { e: 'err_name',  fn: function (x) { return x.trim().length >= 2 ? '' : 'Please enter your full name.'; } },
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