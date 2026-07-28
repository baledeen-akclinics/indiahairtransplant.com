<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">

<!-- Meta File Include -->
<?= $this->include('partials/meta') ?>

<!-- FIX 1: Preload LCP hero background image — makes it discoverable in initial HTML.
     Replace page-hero-bg.webp with the actual filename used in
     .page-hero { background-image: url(...) } in style.css
     This fix is only needed on pages that use .page-hero (location pages, service pages).
     For the home page or pages with a different LCP element, update the filename accordingly. -->
<link rel="preload" as="image" href="<?= base_url('assets/images/page-hero-bg.webp') ?>" fetchpriority="high">

<!-- FIX 2: CSS loaded asynchronously — removes 710ms render-blocking delay.
     Bug fix also applied: was style.css?=d98 (invalid query string), corrected to style.css?d98 -->
<link rel="preload" href="<?= base_url('assets/style.css?d98') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= base_url('assets/style.css?d98') ?>"></noscript>

<!-- Google tag (gtag.js) — kept async, no change needed -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GCE5B37X39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-GCE5B37X39');
</script>

<!-- FIX 3: jQuery deferred — removes 900ms render-blocking CDN delay.
     defer downloads jQuery in parallel with HTML parsing but executes only after parsing completes.
     NOTE: If any inline <script> blocks elsewhere use $() or jQuery() outside of
     DOMContentLoaded or $(document).ready(), they will need to be wrapped in:
     document.addEventListener('DOMContentLoaded', function() { ... });
     The scripts at the bottom of this file already use DOMContentLoaded so they are safe. -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="<?= base_url('assets/popup-form.css?v=5') ?>">
<?= $this->renderSection('styles') ?>
</head>

<body<?= ! empty($bodyClass) ? ' class="' . esc($bodyClass) . '"' : '' ?>>

<header class="header">
  <!-- top row -->
  <div class="container head-top">
    <a class="brand" href="<?= base_url() ?>">
      <img src="<?= base_url('assets/images/iht-logo.png') ?>" alt="IHT Hair Transplant Clinics">
    </a>

    <div class="actions">
      <a class="phone" href="tel:09779944207">
        <span class="ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.7 19.7 0 0 1 11.19 19 19.5 19.5 0 0 1 5.17 13 19.8 19.8 0 0 1 2.08 4.18A2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.12.89.31 1.76.57 2.6a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.48-1.09a2 2 0 0 1 2.11-.45c.84.26 1.71.45 2.6.57A2 2 0 0 1 22 16.92z"/>
          </svg>
        </span>
        09779944207
      </a>

      <button class="hamburger" type="button" aria-label="Open menu" aria-controls="drawer" aria-expanded="false" onclick="openDrawer()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M3 6h18M3 12h18M3 18h18"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- desktop nav row -->
  <nav class="head-nav" aria-label="Primary">
    <div class="container navbar">

      <!-- Hair Transplant -->
      <div class="nav-item has-dd">
        <a href="<?= base_url('hair-transplant') ?>">Hair Transplant <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">
            <li><a href="<?= base_url('male-hair-transplant') ?>">Hair Transplant for Men</a></li>
            <li><a href="<?= base_url('female-hair-transplant') ?>">Hair Transplant for Women</a></li>
            <li><a href="<?= base_url('beard-transplant') ?>">Beard Transplant</a></li>
            <li><a href="<?= base_url('eyebrow-hair-transplant') ?>">Eyebrow Transplant</a></li>
            <li><a href="<?= base_url('moustache-transplant') ?>">Moustache Transplant</a></li>
            <li><a href="<?= base_url('body-hair-transplant') ?>">Body Hair Transplant</a></li>
          </ul>
        </div>
      </div>

      <!-- HT Cost & Planning -->
      <div class="nav-item has-dd">
        <a href="#">HT Cost &amp; Planning <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">
            <li><a href="<?= base_url('hair-transplant-cost') ?>">Hair Transplant Cost in India</a></li>
            <li><a href="<?= base_url('faqs') ?>">Hair Transplant FAQs</a></li>
            <li><a href="<?= base_url('hair-transplant-safety-and-recovery') ?>">Hair Transplant Safety &amp; Recovery</a></li>
          </ul>
        </div>
      </div>

      <!-- Our Techniques -->
      <div class="nav-item has-dd">
        <a href="#">Our Techniques <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">
            <li><a href="<?= base_url('unshaven-hair-transplant') ?>">Unshaven FUE Hair Transplant</a></li>
            <li><a href="<?= base_url('fue-hair-transplant') ?>">FUE Hair Transplant</a></li>
            <li><a href="<?= base_url('fut-hair-transplant') ?>">FUT Hair Transplant</a></li>
          </ul>
        </div>
      </div>

      <!-- Hair Loss -->
      <div class="nav-item has-dd">
        <a href="<?= base_url('hair-loss') ?>">Hair Loss <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Hair &amp; Scalp Conditions</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('dandruff') ?>">Dandruff</a></li>
                <li><a href="<?= base_url('seborrheic-dermatitis') ?>">Seborrheic Dermatitis</a></li>
                <li><a href="<?= base_url('scalp-psoriasis') ?>">Scalp Psoriasis</a></li>
                <li><a href="<?= base_url('scalp-folliculitis') ?>">Scalp Folliculitis</a></li>
              </ul>
            </li>

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Hair Loss Types</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('androgenetic-alopecia') ?>">Androgenetic Alopecia</a></li>
                <li><a href="<?= base_url('alopecia-areata') ?>">Alopecia Areata</a></li>
                <li><a href="<?= base_url('telogen-effluvium') ?>">Telogen Effluvium</a></li>
                <li><a href="<?= base_url('anagen-effluvium') ?>">Anagen Effluvium</a></li>
                <li><a href="<?= base_url('traction-alopecia') ?>">Traction Alopecia</a></li>
                <li><a href="<?= base_url('cicatricial-alopecia') ?>">Scarring (Cicatricial) Alopecia</a></li>
              </ul>
            </li>

            <li><a href="<?= base_url('causes-of-hair-loss') ?>">Causes of Hair Loss</a></li>
            <li><a href="<?= base_url('hair-loss-in-men') ?>">Hair Loss in Men</a></li>
            <li><a href="<?= base_url('hair-loss-in-women') ?>">Hair Loss in Women</a></li>
          </ul>
        </div>
      </div>

      <!-- Hair Loss Treatments -->
      <div class="nav-item has-dd">
        <a href="#">Hair Loss Treatments <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Medications</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('minoxidil-for-hair-loss') ?>">Minoxidil</a></li>
                <li><a href="#">Finasteride</a></li>
                <li><a href="#">Dutasteride</a></li>
              </ul>
            </li>

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Therapies</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('prp-hair-treatment') ?>">PRP Therapy</a></li>
                <li><a href="<?= base_url('gfc-hair-treatment') ?>">GFC Therapy</a></li>
                <li><a href="#">Exosome Therapy</a></li>
                <li><a href="#">Hair Gain Therapy</a></li>
                <li><a href="<?= base_url('low-level-laser-therapy') ?>">Low Level Laser Therapy (LLLT)</a></li>
              </ul>
            </li>

            <li><a href="#">Microneedling / Dermaroller</a></li>
            <li><a href="#">Scalp Micro Pigmentation</a></li>
          </ul>
        </div>
      </div>

      <!-- Results -->
      <div class="nav-item has-dd">
        <a href="#">Results <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Before &amp; After</button>
              <ul class="dd-sub">
                <li><a href="#">Male Hair Transplant</a></li>
                <li><a href="#">Female Hair Transplant</a></li>
                <li><a href="#">Beard Hair Transplant</a></li>
                <li><a href="#">Body Hair Transplant</a></li>
              </ul>
            </li>

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Hair Transplant Videos</button>
              <ul class="dd-sub">
                <li><a href="#">Patient Testimonials</a></li>
                <li><a href="#">Success Stories</a></li>
              </ul>
            </li>

            <li><a href="#">Reviews</a></li>
          </ul>
        </div>
      </div>

      <!-- About -->
      <div class="nav-item has-dd">
        <a href="#">About <span class="caret">▾</span></a>
        <div class="dd">
          <ul class="dd-list">
            <li><a href="<?= base_url('about-us') ?>">About IHT</a></li>

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Our Doctors</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('dr-kapil-dua') ?>">Dr. Kapil Dua</a></li>
                <li><a href="<?= base_url('dr-aman-dua') ?>">Dr Aman Dua</a></li>
              </ul>
            </li>

            <li class="dd-has-sub">
              <button class="dd-toggle" type="button">Clinics</button>
              <ul class="dd-sub">
                <li><a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a></li>
                <li><a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a></li>
                <li><a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a></li>
                <li><a href="<?= base_url('hair-transplant-in-gurgaon') ?>">Gurgaon</a></li>
                <li><a href="<?= base_url('hair-transplant-in-chandigarh') ?>">Chandigarh</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <a href="<?= base_url('blog/') ?>">Blog</a>
      <a href="<?= base_url('contact-us') ?>">Contact Us</a>

    </div>
  </nav>
</header>

<!-- MOBILE DRAWER -->
<div class="drawer" id="drawer" aria-hidden="true">
  <div class="backdrop" onclick="closeDrawer()" aria-hidden="true"></div>

  <aside class="sheet" role="dialog" aria-modal="true" aria-label="Mobile Menu">
    <div class="sheet-head">
      <div class="sheet-brand">
        <img src="https://hair.akclinics.com/IHT2.png" alt="">
      </div>
      <button class="btn-close" type="button" onclick="closeDrawer()" aria-label="Close Menu">X</button>
    </div>

    <!-- MOBILE: accordion menu -->
    <nav class="mnav" aria-label="Mobile Primary">
      <a class="mitem" href="<?= base_url() ?>"><span class="label">Home</span></a>

      <!-- Hair Transplant -->
      <div class="mitem mhas-sub">
        <span class="label">Hair Transplant</span>
        <button class="expander" type="button" aria-label="Expand Hair Transplant" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <a class="mitem" href="<?= base_url('hair-transplant') ?>"><span class="label">Overview</span></a>
        <a class="mitem" href="<?= base_url('male-hair-transplant') ?>"><span class="label">Hair Transplant for Men</span></a>
        <a class="mitem" href="<?= base_url('female-hair-transplant') ?>"><span class="label">Hair Transplant for Women</span></a>
        <a class="mitem" href="<?= base_url('beard-transplant') ?>"><span class="label">Beard Transplant</span></a>
        <a class="mitem" href="<?= base_url('eyebrow-hair-transplant') ?>"><span class="label">Eyebrow Transplant</span></a>
        <a class="mitem" href="<?= base_url('moustache-transplant') ?>"><span class="label">Moustache Transplant</span></a>
        <a class="mitem" href="#"><span class="label">Crown Area Transplant</span></a>
        <a class="mitem" href="#"><span class="label">Scar / Burn Hair Transplant</span></a>
        <a class="mitem" href="#"><span class="label">Hairline Reconstruction</span></a>
        <a class="mitem" href="#"><span class="label">Failed Hair Transplant Correction</span></a>
        <a class="mitem" href="#"><span class="label">Afro Hair Transplant</span></a>
        <a class="mitem" href="#"><span class="label">Body Hair Transplant</span></a>
      </div>

      <!-- HT Cost & Planning -->
      <div class="mitem mhas-sub">
        <span class="label">HT Cost &amp; Planning</span>
        <button class="expander" type="button" aria-label="Expand HT Cost &amp; Planning" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <a class="mitem" href="<?= base_url('hair-transplant-cost') ?>"><span class="label">Hair Transplant Cost in India</span></a>
        <a class="mitem" href="#"><span class="label">Graft Calculator</span></a>
        <a class="mitem" href="#"><span class="label">EMI on Hair Transplant</span></a>
        <a class="mitem" href="<?= base_url('faqs') ?>"><span class="label">Hair Transplant FAQs</span></a>
        <a class="mitem" href="<?= base_url('hair-transplant-safety-and-recovery') ?>"><span class="label">Hair Transplant Safety &amp; Recovery</span></a>
      </div>

      <!-- Our Techniques -->
      <div class="mitem mhas-sub">
        <span class="label">Our Techniques</span>
        <button class="expander" type="button" aria-label="Expand Our Techniques" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <a class="mitem" href="#"><span class="label">Bio-FUE Hair Transplant</span></a>
        <a class="mitem" href="<?= base_url('unshaven-hair-transplant') ?>"><span class="label">Unshaven FUE Hair Transplant</span></a>
        <a class="mitem" href="<?= base_url('fue-hair-transplant') ?>"><span class="label">FUE Hair Transplant</span></a>
        <a class="mitem" href="<?= base_url('fut-hair-transplant') ?>"><span class="label">FUT Hair Transplant</span></a>
      </div>

      <!-- Hair Loss -->
      <div class="mitem mhas-sub">
        <span class="label">Hair Loss</span>
        <button class="expander" type="button" aria-label="Expand Hair Loss" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <div class="mitem mhas-sub">
          <span class="label">Hair &amp; Scalp Conditions</span>
          <button class="expander" type="button" aria-label="Expand Hair &amp; Scalp Conditions" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('dandruff') ?>"><span class="label">Dandruff</span></a>
          <a class="mitem" href="<?= base_url('seborrheic-dermatitis') ?>"><span class="label">Seborrheic Dermatitis</span></a>
          <a class="mitem" href="<?= base_url('scalp-psoriasis') ?>"><span class="label">Scalp Psoriasis</span></a>
          <a class="mitem" href="<?= base_url('scalp-folliculitis') ?>"><span class="label">Scalp Folliculitis</span></a>
        </div>

        <div class="mitem mhas-sub">
          <span class="label">Hair Loss Types</span>
          <button class="expander" type="button" aria-label="Expand Hair Loss Types" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('androgenetic-alopecia') ?>"><span class="label">Androgenetic Alopecia</span></a>
          <a class="mitem" href="<?= base_url('alopecia-areata') ?>"><span class="label">Alopecia Areata</span></a>
          <a class="mitem" href="<?= base_url('telogen-effluvium') ?>"><span class="label">Telogen Effluvium</span></a>
          <a class="mitem" href="<?= base_url('anagen-effluvium') ?>"><span class="label">Anagen Effluvium</span></a>
          <a class="mitem" href="<?= base_url('traction-alopecia') ?>"><span class="label">Traction Alopecia</span></a>
          <a class="mitem" href="<?= base_url('cicatricial-alopecia') ?>"><span class="label">Scarring (Cicatricial) Alopecia</span></a>
        </div>

        <a class="mitem" href="<?= base_url('causes-of-hair-loss') ?>"><span class="label">Causes of Hair Loss</span></a>
        <a class="mitem" href="<?= base_url('hair-loss-in-men') ?>"><span class="label">Hair Loss in Men</span></a>
        <a class="mitem" href="<?= base_url('hair-loss-in-women') ?>"><span class="label">Hair Loss in Women</span></a>
      </div>

      <!-- Hair Loss Treatments -->
      <div class="mitem mhas-sub">
        <span class="label">Hair Loss Treatments</span>
        <button class="expander" type="button" aria-label="Expand Hair Loss Treatments" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <div class="mitem mhas-sub">
          <span class="label">Medications</span>
          <button class="expander" type="button" aria-label="Expand Medications" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('minoxidil-for-hair-loss') ?>"><span class="label">Minoxidil</span></a>
          <a class="mitem" href="#"><span class="label">Finasteride</span></a>
          <a class="mitem" href="#"><span class="label">Dutasteride</span></a>
        </div>

        <div class="mitem mhas-sub">
          <span class="label">Therapies</span>
          <button class="expander" type="button" aria-label="Expand Therapies" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('prp-hair-treatment') ?>"><span class="label">PRP Therapy</span></a>
          <a class="mitem" href="<?= base_url('gfc-hair-treatment') ?>"><span class="label">GFC Therapy</span></a>
          <a class="mitem" href="#"><span class="label">Exosome Therapy</span></a>
          <a class="mitem" href="#"><span class="label">Hair Gain Therapy</span></a>
          <a class="mitem" href="<?= base_url('low-level-laser-therapy') ?>"><span class="label">Low Level Laser Therapy (LLLT)</span></a>
        </div>

        <a class="mitem" href="#"><span class="label">Microneedling / Dermaroller</span></a>
        <a class="mitem" href="#"><span class="label">Scalp Micro Pigmentation</span></a>
      </div>

      <!-- Results -->
      <div class="mitem mhas-sub">
        <span class="label">Results</span>
        <button class="expander" type="button" aria-label="Expand Results" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <div class="mitem mhas-sub">
          <span class="label">Before &amp; After</span>
          <button class="expander" type="button" aria-label="Expand Before &amp; After" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="#"><span class="label">Male Hair Transplant</span></a>
          <a class="mitem" href="#"><span class="label">Female Hair Transplant</span></a>
          <a class="mitem" href="#"><span class="label">Beard Hair Transplant</span></a>
          <a class="mitem" href="#"><span class="label">Body Hair Transplant</span></a>
        </div>

        <div class="mitem mhas-sub">
          <span class="label">Hair Transplant Videos</span>
          <button class="expander" type="button" aria-label="Expand Hair Transplant Videos" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="#"><span class="label">Patient Testimonials</span></a>
          <a class="mitem" href="#"><span class="label">Success Stories</span></a>
        </div>

        <a class="mitem" href="#"><span class="label">Reviews</span></a>
      </div>

      <!-- About -->
      <div class="mitem mhas-sub">
        <span class="label">About</span>
        <button class="expander" type="button" aria-label="Expand About" aria-expanded="false">▾</button>
      </div>
      <div class="msub">
        <a class="mitem" href="<?= base_url('about-us') ?>"><span class="label">About IHT</span></a>

        <div class="mitem mhas-sub">
          <span class="label">Our Doctors</span>
          <button class="expander" type="button" aria-label="Expand Our Doctors" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('dr-kapil-dua') ?>"><span class="label">Dr. Kapil Dua</span></a>
          <a class="mitem" href="<?= base_url('dr-aman-dua') ?>"><span class="label">Dr Aman Dua</span></a>
        </div>

        <div class="mitem mhas-sub">
          <span class="label">Clinics</span>
          <button class="expander" type="button" aria-label="Expand Clinics" aria-expanded="false">▾</button>
        </div>
        <div class="msub">
          <a class="mitem" href="<?= base_url('hair-transplant-in-delhi') ?>"><span class="label">Delhi</span></a>
          <a class="mitem" href="<?= base_url('hair-transplant-in-ludhiana') ?>"><span class="label">Ludhiana</span></a>
          <a class="mitem" href="<?= base_url('hair-transplant-in-bangalore') ?>"><span class="label">Bangalore</span></a>
          <a class="mitem" href="<?= base_url('hair-transplant-in-gurgaon') ?>"><span class="label">Gurgaon</span></a>
          <a class="mitem" href="<?= base_url('hair-transplant-in-chandigarh') ?>"><span class="label">Chandigarh</span></a>
        </div>
      </div>

      <a class="mitem" href="#"><span class="label">Blog</span></a>
      <a class="mitem" href="<?= base_url('contact-us') ?>"><span class="label">Contact Us</span></a>
    </nav>
  </aside>
</div>

<script>
function openDrawer() {
  const drawer = document.getElementById('drawer');
  const burger = document.querySelector('.hamburger');
  if (!drawer) return;

  drawer.classList.add('open');
  drawer.setAttribute('aria-hidden', 'false');
  document.body.classList.add('no-scroll');

  if (burger) burger.setAttribute('aria-expanded', 'true');
}

function closeDrawer() {
  const drawer = document.getElementById('drawer');
  const burger = document.querySelector('.hamburger');
  if (!drawer) return;

  drawer.classList.remove('open');
  drawer.setAttribute('aria-hidden', 'true');
  document.body.classList.remove('no-scroll');

  if (burger) burger.setAttribute('aria-expanded', 'false');

  const mnav = document.querySelector('.mnav');
  if (!mnav) return;

  mnav.querySelectorAll('.mitem.mhas-sub').forEach(function(item) {
    item.classList.remove('mopen');
  });

  mnav.querySelectorAll('.expander').forEach(function(btn) {
    btn.setAttribute('aria-expanded', 'false');
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const mnav = document.querySelector('.mnav');
  if (!mnav) return;

  mnav.addEventListener('click', function(e) {
    const btn = e.target.closest('.expander');
    if (!btn) return;

    e.preventDefault();
    e.stopPropagation();

    const item = btn.closest('.mitem.mhas-sub');
    if (!item) return;

    const sub = item.nextElementSibling;
    if (!sub || !sub.classList.contains('msub')) return;

    const isOpen = item.classList.contains('mopen');
    const parent = item.parentElement;

    if (parent) {
      Array.from(parent.children).forEach(function(el) {
        if (
          el !== item &&
          el.classList &&
          el.classList.contains('mitem') &&
          el.classList.contains('mhas-sub')
        ) {
          el.classList.remove('mopen');

          const siblingBtn = el.querySelector('.expander');
          if (siblingBtn) siblingBtn.setAttribute('aria-expanded', 'false');

          const siblingSub = el.nextElementSibling;
          if (siblingSub && siblingSub.classList.contains('msub')) {
            siblingSub.querySelectorAll('.mitem.mhas-sub').forEach(function(nestedItem) {
              nestedItem.classList.remove('mopen');
            });

            siblingSub.querySelectorAll('.expander').forEach(function(nestedBtn) {
              nestedBtn.setAttribute('aria-expanded', 'false');
            });
          }
        }
      });
    }

    if (isOpen) {
      item.classList.remove('mopen');
      btn.setAttribute('aria-expanded', 'false');

      sub.querySelectorAll('.mitem.mhas-sub').forEach(function(nestedItem) {
        nestedItem.classList.remove('mopen');
      });

      sub.querySelectorAll('.expander').forEach(function(nestedBtn) {
        nestedBtn.setAttribute('aria-expanded', 'false');
      });
    } else {
      item.classList.add('mopen');
      btn.setAttribute('aria-expanded', 'true');
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const items = document.querySelectorAll('.dd-has-sub');

  items.forEach(function(item) {
    item.addEventListener('mouseenter', function() {
      const submenu = item.querySelector('.dd-sub');
      if (!submenu) return;

      item.classList.remove('open-left');

      const rect = submenu.getBoundingClientRect();
      const viewportWidth = window.innerWidth;

      if (rect.right > viewportWidth - 10) {
        item.classList.add('open-left');
      }
    });

    item.addEventListener('mouseleave', function() {
      item.classList.remove('open-left');
    });
  });
});
</script>