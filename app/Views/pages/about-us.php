<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<!-- ===== ABOUT US PAGE ===== -->

<!-- Header File Include -->
<!-- Page scope wrapper (needed for .iht-about CSS) -->
<div class="iht-about">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ============ BANNER ============ -->
  <section class="page-hero" role="banner" aria-label="About Us Banner">
    <div class="container wrap">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">›</span>
        <span aria-current="page">About Us</span>
      </nav>

      <h1 class="page-title">About Us</h1>
      <p class="page-sub">
        India’s leading hair transplant clinic, led by world-renowned surgeons, known for delivering natural-looking results using advanced techniques
      </p>
      <!-- No CTAs here -->
    </div>
  </section>

  <!-- ============ MEDIA INTRO (image + text) ============ -->
  <section class="about-media">
    <div class="container about-grid">
      <div class="media-wrap">
        <div class="media-blob" aria-hidden="true"></div>
        <figure class="media-card">
          <img src="<?= base_url('assets/images/about-iht-clinic.png') ?>"
            alt="IHT clinic reception area (illustrative)">
        </figure>
      </div>

      <div>
        <h2 class="about-h1">India Hair Transplant (IHT)</h2>
        <p class="about-lead">
          At IHT, we focus on helping patients restore their hair in a way that looks natural, feels comfortable, and lasts over time.
        </p>

        <p class="about-lead">
          With over 20 years of clinical experience, IHT follows a carefully planned, doctor-led approach to hair transplantation. Every treatment begins with a detailed hair and scalp evaluation, where donor area safety, hair density, and natural hairline design are assessed before any treatment decision is made.
        </p>

        <p class="about-lead">
          IHT was founded by Dr. Kapil Dua (MBBS, MS, FISHRS), Chief Hair Transplant Surgeon, recognised for his expertise in natural hairline planning and the management of complex hair loss cases. His experience guides how surgeries are planned, performed, and followed up at IHT, with a strong focus on patient outcomes.
        </p>

        <p class="about-lead">
          IHT draws its clinical foundation from AK Clinics, an established hair and skin care clinic in India, founded in 2008, with extensive experience in hair restoration, aesthetic dermatology, and cosmetic surgery.
        </p>

        <p class="about-lead">
          Every treatment at IHT is planned with medical responsibility, clear patient counselling, and a focus on long-term hair health rather than short-term promises. We serve patients across India and internationally through our centres in Delhi, Ludhiana, and Bangalore, following consistent clinical practices at every location.
        </p>

      </div>
    </div>
  </section>

  <!-- ============ MISSION & VISION ============ -->
  <section class="mv">
    <div class="container mv-grid">
      <div class="mv-box">
        <h3 class="mv-title">OUR MISSION</h3>
        <p>
          Our mission is to deliver safe, high-quality hair restoration treatments by combining modern techniques with experienced surgical expertise. We focus on precision, patient safety, and consistent care from the first consultation through long-term follow-up.
        </p>

      </div>

      <div class="mv-box">
        <h3 class="mv-title">OUR VISION</h3>
        <p>
          Our vision is to build one of India’s most trusted hair transplant networks, recognised for patient safety, affordable care, and results that speak for themselves. We aim to earn patients’ trust through honest guidance, medically responsible treatment, and continuous training supported by refined surgical practices.
        </p>


      </div>
    </div>
  </section>


  <section class="iht-cta-strip">
    <div class="container iht-cta-wrap">
      <p class="iht-cta-text">
        👉 Book a consultation with our experienced hair transplant surgeons to discuss your hair loss concerns and available treatment options.
      </p>
      <a href="tel:09779944207" class="iht-cta-btn">Call 09779944207</a>
    </div>
  </section>
  <section class="celeb-story">
    <div class="container">

      <h2 class="results-title">Why Choose IHT Clinic for Hair Transplant?</h2>

      <div class="results-divider" aria-hidden="true">
        <span class="line"></span>
        <span class="cross">✚</span>
        <span class="line"></span>
      </div>

      <div class="cs-wrap">

        <div class="cs-img">
          <img src="<?= base_url('assets/images/why-choose-iht-clinic.png') ?>" alt="Why Choose IHT Clinic for Hair Transplant">
        </div>

        <div class="cs-content">
          <p class="cs-text">
            IHT is a trusted hair transplant clinic in India, known for surgeon-driven care, cutting-edge technology, and natural-looking hair transplant results. We focus on achieving high graft survival and minimal downtime so that patients can return to daily life with confidence and clarity.

          </p>

          <p class="cs-text">
            We deliver hair transplant care where safety and long-term success are prioritised at every stage. From the first consultation itself, patients are given realistic expectations about achievable density, coverage, and final results, ensuring treatment planning is honest, informed, and aligned with long-term hair loss patterns.
          </p>
          <ul class="feature-list">
            <li>Transparent counselling to set realistic expectations before treatment</li>
            <li>No one-size-fits-all or package-driven planning</li>
            <li>Case selection based on medical suitability rather than graft numbers</li>
            <li>Results planned to look natural and age appropriately over time</li>
            <li>Consistent medical supervision from consultation through recovery</li>
            <li>Long-term outcome monitoring with structured follow-up care</li>
            <li>Uniform clinical standards maintained across all IHT centres</li>
          </ul>


          <a href="tel:09779944207" class="btn-cta">Call 09779944207</a>
        </div>

      </div>

    </div>
  </section>



  <section class="doctors-section" id="doctors">
    <div class="container">
      <h2 class="results-title">Our Team of Experienced Hair Transplant Doctors</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span>
        <span class="cross">✚</span>
        <span class="line"></span>
      </div>

      <p class="docs-intro">
        Meet the professionals behind every successful hair transplant at IHT. Each procedure is properly planned and performed by experienced surgeons, with a strong focus on patient safety, surgical precision, and outcomes designed to remain natural over time.

      </p>

      <div class="docs-carousel" id="docsCarousel" role="region" aria-roledescription="carousel" aria-label="Doctors">
        <button class="rc-arrow rc-prev" aria-label="Previous doctor" type="button">‹</button>

        <div class="rc-track docs-track" id="docsTrack" aria-live="polite">
          <figure class="doc-slide">
            <div class="doc-card">
              <img src="<?= base_url('assets/images/dr-kapil-dua.webp') ?>" alt="Dr. Kapil Dua">
              <figcaption class="doc-meta">
                <span class="doc-name" data-qual="MBBS, MS - Chairman &amp; Chief Hair Transplant Surgeon, Member: Past President - ISHRS (USA), AAHRS (Asia), AHRS (India)">
                  Dr. Kapil Dua
                </span>
              </figcaption>
            </div>
          </figure>

          <figure class="doc-slide">
            <div class="doc-card">
              <img src="<?= base_url('assets/images/dr-aman-dua.webp') ?>" alt="Dr. Aman Dua">
              <figcaption class="doc-meta">
                <span class="doc-name" data-qual="MBBS, MD, Chief Dermatologist, FISHRS, Board Of Governor (AHRS India)">
                  Dr. Aman Dua
                </span>

              </figcaption>
            </div>
          </figure>

          <figure class="doc-slide">
            <div class="doc-card">
              <img src="<?= base_url('assets/images/dr-bhawna.webp') ?>" alt="Dr. Bhawna Bhardwaj">
              <figcaption class="doc-meta">
                <span class="doc-name" data-qual="MBBS, DVDL (Skin &amp; VD), Senior Consultant Dermatologist &amp; Hair Transplant Surgeon">
                  Dr. Bhawna Bhardwaj
                </span>
              </figcaption>
            </div>
          </figure>

          <figure class="doc-slide">
            <div class="doc-card">
              <img src="<?= base_url('assets/images/dr-sohail.webp') ?>" alt="Dr. Suhail Ahmed">
              <figcaption class="doc-meta">
                <span class="doc-name" data-qual="MBBS, MD Dermatalogy, Consultant Dermatologist &amp; Hair Transplant Surgeon">
                  Dr. Suhail Ahmed
                </span>
              </figcaption>
            </div>
          </figure>
          <figure class="doc-slide">
            <div class="doc-card">
              <img src="<?= base_url('assets/images/dr-nitin.webp') ?>" alt="Dr. Nithin N">
              <figcaption class="doc-meta">
                <span class="doc-name" data-qual="MBBS, MD Dermatalogy, Consultant Dermatologist &amp; Hair Transplant Surgeon">
                  Dr. Nithin N
                </span>
              </figcaption>
            </div>
          </figure>
        </div>

        <button class="rc-arrow rc-next" aria-label="Next doctor" type="button">›</button>
      </div>
    </div>
  </section>

<?= $this->include('partials/hair-transplant-cost') ?>
<?= $this->include('partials/location') ?>


</div><!-- /.iht-about -->

<!-- Footer File Include -->

<?= $this->endSection() ?>