/* =========================================================
   BLOG SINGLE — blog-single.js
   Handles: TOC toggle, TOC active highlight, FAQ accordion
   Load with: <script defer src="/assets/blog-single.js"></script>
========================================================= */

/* TOC TOGGLE */
(function () {
  var btn  = document.getElementById('tocToggle');
  var body = document.getElementById('tocBody');
  if (!btn || !body) return;
  var setState = function (open) {
    body.style.display = open ? '' : 'none';
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    var tn = btn.childNodes[0];
    if (tn && tn.nodeType === 3) tn.nodeValue = open ? 'Hide' : 'Show';
    var ic = btn.querySelector('svg path');
    if (ic) ic.setAttribute('d', open ? 'M7 14l5-5 5 5H7z' : 'M7 10l5 5 5-5H7z');
  };
  btn.addEventListener('click', function () {
    setState(btn.getAttribute('aria-expanded') !== 'true');
  });
})();

/* TOC ACTIVE HIGHLIGHT */
(function () {
  var links    = Array.from(document.querySelectorAll('.bs-toc-link'));
  var sections = Array.from(document.querySelectorAll('[data-toc]'));
  if (!links.length || !sections.length) return;
  var map = new Map();
  links.forEach(function (a) { map.set(a.getAttribute('href').replace('#', ''), a); });
  var setActive = function (id) {
    links.forEach(function (l) { l.classList.remove('is-active'); });
    var el = map.get(id);
    if (el) el.classList.add('is-active');
  };
  setActive(sections[0].id);
  var io = new IntersectionObserver(function (entries) {
    var vis = entries.filter(function (e) { return e.isIntersecting; })
                     .sort(function (a, b) { return b.intersectionRatio - a.intersectionRatio; })[0];
    if (vis) setActive(vis.target.id);
  }, { threshold: [0.15, 0.35, 0.5], rootMargin: '-15% 0px -65% 0px' });
  sections.forEach(function (s) { io.observe(s); });
})();

/* FAQ ACCORDION */
(function () {
  var list = document.getElementById('faqList');
  if (!list) return;
  list.addEventListener('click', function (e) {
    var btn = e.target.closest('.bs-faq-q');
    if (!btn) return;
    var item   = btn.closest('.bs-faq-item');
    var ans    = item.querySelector('.bs-faq-a');
    var isOpen = btn.getAttribute('aria-expanded') === 'true';
    list.querySelectorAll('.bs-faq-q[aria-expanded="true"]').forEach(function (q) {
      if (q === btn) return;
      q.setAttribute('aria-expanded', 'false');
      var a = q.closest('.bs-faq-item').querySelector('.bs-faq-a');
      if (a) a.hidden = true;
    });
    btn.setAttribute('aria-expanded', String(!isOpen));
    ans.hidden = isOpen;
  });
})();
