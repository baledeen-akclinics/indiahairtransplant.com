<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<!-- ===== HERO ===== -->
<section class="hero-wrap" id="heroSlider" role="region" aria-roledescription="carousel" aria-label="Clinic hero slider">
  <button class="hero-arrow hero-prev" id="heroPrev" aria-label="Previous slide">‹</button>
  <button class="hero-arrow hero-next" id="heroNext" aria-label="Next slide">›</button>

  <div class="hero-content">
    <div class="inner">
      <h1 class="hero-title" id="heroTitle">Best Hair Transplant Clinic in India Delivering Natural Results</h1>
      <div class="hero-cta">
        <a class="hero-btn" href="#analysis">Book Your Free Consultation</a>
      </div>
    </div>
  </div>

  <div class="hero-track" id="heroTrack" aria-live="polite">
    <article class="hero-slide" aria-roledescription="slide" aria-label="1 of 2"
      data-title="Best Hair Transplant Clinic in India Delivering Natural Results">
      <div class="hero-bg">
        <img src="<?= base_url('assets/images/iht-hair-transplant-banner-1.webp') ?>" alt="Best Hair Transplant Clinic in India">
      </div>
    </article>


    <article class="hero-slide" aria-roledescription="slide" aria-label="2 of 2"
      data-title="Best Hair Transplant Clinic in India Delivering Natural Results">
      <div class="hero-bg">
        <img src="<?= base_url('assets/images/iht-hair-transplant-banner-2.webp') ?>" alt="Hair Transplant in India">
      </div>
    </article>

    <article class="hero-slide" aria-roledescription="slide" aria-label="2 of 2"
      data-title="Best Hair Transplant Clinic in India Delivering Natural Results">
      <div class="hero-bg">
        <img src="<?= base_url('assets/images/iht-hair-transplant-banner-3.webp') ?>" alt="Hair restoration treatment in India">
      </div>
    </article>

  </div>

  <div class="hero-dots" id="heroDots" aria-hidden="true">
    <span class="hero-dot active"></span>
    <span class="hero-dot"></span>
  </div>
</section>

<section class="results-section" aria-labelledby="resultsHeading">
  <div class="container">
    <h2 id="resultsHeading" class="results-title">Hair Transplant Results Delivered at IHT</h2>

    <div class="results-divider" aria-hidden="true">
      <span class="line"></span>
      <span class="cross" role="img" aria-label="decorative cross">✚</span>
      <span class="line"></span>
    </div>

    <div class="results-carousel" id="resultsCarousel" role="region" aria-roledescription="carousel" aria-label="Before & After Results">
      <button class="rc-arrow rc-prev" aria-label="Previous results" type="button">‹</button>
      <div class="rc-track" id="rcTrack" aria-live="polite">
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-1.webp') ?>" alt="Patient result 1 – front view">
          </div>
        </figure>
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-2.webp') ?>" alt="Patient result 2 – front view">
          </div>
        </figure>
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-3.webp') ?>" alt="Patient result 3 – front view">
          </div>
        </figure>
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-4.webp') ?>" alt="Patient result 4 – front view">
          </div>
        </figure>
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-5.webp') ?>" alt="Patient result 5 – front view">
          </div>
        </figure>
        <figure class="rc-slide">
          <div class="rc-card">
            <img src="<?= base_url('assets/images/iht-result-6.webp') ?>" alt="Patient result 6 – front view">
          </div>
        </figure>
      </div>
      <button class="rc-arrow rc-next" aria-label="Next results" type="button">›</button>
    </div>

    <div class="results-cta">
      <a class="results-button" href="#results">See More Results</a>
    </div>

    <p class="results-text">
      The results shown here reflect proper medical planning and execution by experienced hair transplant surgeons at IHT Clinic, a trusted <a href="<?= base_url('hair-transplant') ?>">hair transplant clinic in India</a>. Each procedure is customised based on individual hair loss patterns, donor area strength, and long-term restoration goals. The focus remains on natural hairline design, responsible graft placement, and results that develop gradually over time. Outcomes may vary depending on individual factors.
    </p>
    <!-- <div class="results-text">
      <ul class="feature-list">
        <li>Team of 30+ Best Hair Transplant Doctors in India</li>
        <li>Robust presence with over 13 global centers</li>
        <li>14+ Years of Experience</li>
      </ul>
    </div> -->
  </div>
</section>

<section class="celeb-story">
  <div class="container">

    <h2 class="results-title">Best Hair Transplant Clinic in India</h2>

    <div class="results-divider" aria-hidden="true">
      <span class="line"></span>
      <span class="cross">✚</span>
      <span class="line"></span>
    </div>

    <div class="cs-wrap">

      <div class="cs-img">
        <img src="<?= base_url('assets/images/gaurav-wasan-hair-transplant.webp') ?>"
          alt="Celebrity hair transplant result at IHT Clinics">
      </div>

      <div class="cs-content">
        <p class="cs-text">
          <a href="<?= base_url() ?>">IHT Clinic (India Hair Transplant)</a> is a leading hair transplant clinic in India, trusted by patients from across the country, including public figures and professionals, for care delivered by experienced surgeons and medically planned procedures. Every treatment is approached as a medical process rather than a cosmetic shortcut, with patient safety, natural outcomes, and long-term hair health as the primary goals.
        </p>

        <p class="cs-text">
          Each hair transplant at IHT begins with a detailed clinical evaluation, where factors such as hair loss pattern, donor area strength, scalp condition, and future hair loss progression are carefully assessed. Based on this diagnosis, a personalised treatment plan is created to ensure natural hairline design, appropriate graft distribution, and responsible donor management.
        </p>
        <p class="cs-text">
          Procedures are performed by experienced hair transplant surgeons using <a href="<?= base_url('fue-hair-transplant') ?>">advanced FUE</a> and Bio-FUE techniques, following established medical protocols and precision-driven methods. The focus remains on correct graft angulation, natural density, and results that evolve gradually over time in line with normal hair growth cycles.
        </p>

        <ul class="feature-list">
          <li>Led by India’s Top Hair Transplant Surgeons</li>
          <li>Patient-specific approach for every case</li>
          <li>Trusted by patients from India and international locations</li>
          <li>Structured post-procedure care and follow-up support</li>
          <li>Clear communication with realistic expectations and outcomes</li>
        </ul>

        <a href="tel:09779944207" class="btn-cta">Call 09779944207</a>
      </div>

    </div>

  </div>
</section>

<section class="results-section videos" id="videos">
  <div class="container">
    <h2 class="results-title">Hair Transplant Videos</h2>

    <div class="results-divider" aria-hidden="true">
      <span class="line"></span>
      <span class="cross" role="img" aria-label="decorative cross">✚</span>
      <span class="line"></span>
    </div>

    <div class="results-carousel" id="videosCarousel" role="region" aria-roledescription="carousel" aria-label="Patient Videos">
      <button class="rc-arrow rc-prev" aria-label="Previous videos" type="button">‹</button>

      <div class="rc-track" id="videosTrack" aria-live="polite">
        <figure class="rc-slide">
          <a class="yt-card" href="https://www.youtube.com/watch?v=THKeJ2Z2YyE" data-yid="THKeJ2Z2YyE" aria-label="Play video">
            <img class="yt-thumb" src="<?= base_url('assets/images/hair-transplant-myths-and-facts.jpg') ?>" alt="Patient testimonial video">
            <span class="yt-play" aria-hidden="true">
              <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.52 7.85a8 8 0 0 0-5.64-5.65C56.1 1 34 1 34 1s-22.1 0-26.88 1.2A8 8 0 0 0 1.48 7.85 83.4 83.4 0 0 0 .28 24a83.4 83.4 0 0 0 1.2 16.15 8 8 0 0 0 5.64 5.65C12.9 47 34 47 34 47s22.1 0 26.88-1.2a8 8 0 0 0 5.64-5.65A83.4 83.4 0 0 0 67.72 24a83.4 83.4 0 0 0-1.2-16.15Z" fill="#212121" opacity=".25" />
                <path d="M45 24 27 14v20z" fill="#fff" />
              </svg>
            </span>
          </a>
        </figure>

        <figure class="rc-slide">
          <a class="yt-card" href="https://www.youtube.com/watch?v=Dhm6LF1fYLQ" data-yid="Dhm6LF1fYLQ" aria-label="Play video">
            <img class="yt-thumb" src="<?= base_url('assets/images/hair-transplant-pod-cast-with-anmol-kawtra.jpg') ?>" alt="Surgeon explains hairline design">
            <span class="yt-play" aria-hidden="true">
              <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.52 7.85a8 8 0 0 0-5.64-5.65C56.1 1 34 1 34 1s-22.1 0-26.88 1.2A8 8 0 0 0 1.48 7.85 83.4 83.4 0 0 0 .28 24a83.4 83.4 0 0 0 1.2 16.15 8 8 0 0 0 5.64 5.65C12.9 47 34 47 34 47s22.1 0 26.88-1.2a8 8 0 0 0 5.64-5.65A83.4 83.4 0 0 0 67.72 24a83.4 83.4 0 0 0-1.2-16.15Z" fill="#212121" opacity=".25" />
                <path d="M45 24 27 14v20z" fill="#fff" />
              </svg>
            </span>
          </a>
        </figure>

        <figure class="rc-slide">
          <a class="yt-card" href="https://www.youtube.com/watch?v=-ZNV5WBHXrI" data-yid="-ZNV5WBHXrI/" aria-label="Play video">
            <img class="yt-thumb" src="<?= base_url('assets/images/drink-after-hair-transplant.jpg') ?>" alt="Can You Drink After a Hair Transplant?">
            <span class="yt-play" aria-hidden="true">
              <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.52 7.85a8 8 0 0 0-5.64-5.65C56.1 1 34 1 34 1s-22.1 0-26.88 1.2A8 8 0 0 0 1.48 7.85 83.4 83.4 0 0 0 .28 24a83.4 83.4 0 0 0 1.2 16.15 8 8 0 0 0 5.64 5.65C12.9 47 34 47 34 47s22.1 0 26.88-1.2a8 8 0 0 0 5.64-5.65A83.4 83.4 0 0 0 67.72 24a83.4 83.4 0 0 0-1.2-16.15Z" fill="#212121" opacity=".25" />
                <path d="M45 24 27 14v20z" fill="#fff" />
              </svg>
            </span>
          </a>
        </figure>

        <figure class="rc-slide">
          <a class="yt-card" href="https://www.youtube.com/watch?v=oTBzoRLjaZ4" data-yid="oTBzoRLjaZ4" aria-label="Play video">
            <img class="yt-thumb" src="<?= base_url('assets/images/beard-hair-transplant.jpg') ?>" alt="Bio-FUE procedure walkthrough">
            <span class="yt-play" aria-hidden="true">
              <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.52 7.85a8 8 0 0 0-5.64-5.65C56.1 1 34 1 34 1s-22.1 0-26.88 1.2A8 8 0 0 0 1.48 7.85 83.4 83.4 0 0 0 .28 24a83.4 83.4 0 0 0 1.2 16.15 8 8 0 0 0 5.64 5.65C12.9 47 34 47 34 47s22.1 0 26.88-1.2a8 8 0 0 0 5.64-5.65A83.4 83.4 0 0 0 67.72 24a83.4 83.4 0 0 0-1.2-16.15Z" fill="#212121" opacity=".25" />
                <path d="M45 24 27 14v20z" fill="#fff" />
              </svg>
            </span>
          </a>
        </figure>
      </div>

      <button class="rc-arrow rc-next" aria-label="Next videos" type="button">›</button>
    </div>

    <section class="iht-cta-strip">
      <div class="container iht-cta-wrap">
        <p class="iht-cta-text">
          👉 Looking for the best hair transplant clinic in India? Call now to book a free consultation with our experienced team.
        </p>
        <a href="tel:09779944207" class="iht-cta-btn">Call 09779944207</a>
      </div>
    </section>

  </div>
</section>

<!-- YouTube Modal -->
<div class="yt-modal" id="ytModal" aria-hidden="true">
  <div class="yt-backdrop" data-close></div>
  <div class="yt-sheet">
    <button class="yt-close" type="button" title="Close" data-close>×</button>
    <iframe class="yt-frame" id="ytFrame" src="" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>

<section class="celeb-story">
  <div class="container">

    <h2 class="results-title">Meet the Founder – Dr. Kapil Dua</h2>
    <p style="text-align: center; color: #ffffff;">(Renowned Hair Transplant Surgeon in India)</p>
    <div class="results-divider" aria-hidden="true">
      <span class="line"></span>
      <span class="cross">✚</span>
      <span class="line"></span>
    </div>

    <div class="cs-wrap">

      <div class="cs-img">
        <img src="<?= base_url('assets/images/dr-kapil-dua.webp') ?>"
          alt="Dr. Kapil Dua – Co-Founder & Hair Transplant Surgeon at IHT Clinics">
      </div>

      <div class="cs-content">

        <p class="cs-text">
          Dr. Kapil Dua is the Founder of IHT Clinic (India Hair Transplant) and <a href="https://akclinics.com/">AK Clinics</a>, and is widely recognised as one of India’s most experienced and respected hair transplant surgeons. With over 20 years of surgical experience, His approach emphasises natural results, patient safety, and long-term outcomes.
        </p>

        <p class="cs-text">
          Dr. Dua is widely recognised for his leadership in advancing ethical, surgeon-performed hair restoration practices in India. Beyond clinical practice, he has contributed significantly to the global hair restoration community through leadership and academic roles with international organisations. He has participated in professional committees and authored multiple chapters in leading textbooks on hair transplantation, reflecting a strong commitment to advancing surgical standards, education, and evidence-based practice.</p>
        <p class="cs-text">
          Under his guidance, IHT Clinic follows a patient-first, medical approach where each procedure is planned based on the individual’s hair loss pattern, donor area condition, and long-term restoration goals. Results are allowed to develop naturally over time, with a clear focus on safety, transparency, and ethical care.</p>

        <ul class="feature-list">
          <li>20+ Years of Surgical Experience</li>
          <li>10,000+ Successful Hair Transplants</li>
          <li>Former President – AHRS India</li>
          <li>Active member of leading International Hair Restoration Societies</li>
          <li>Trusted by patients, professionals, and public figures</li>
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
      Faces behind every successful hair transplant at IHT, a team of experienced doctors who plan and perform each procedure with medical precision, patient safety, and a focus on natural results.
    </p>

    <div class="docs-carousel" id="docsCarousel" role="region" aria-roledescription="carousel" aria-label="Doctors">
      <button class="rc-arrow rc-prev" aria-label="Previous doctor" type="button">‹</button>

      <div class="rc-track docs-track" id="docsTrack" aria-live="polite">
        <figure class="doc-slide">
          <div class="doc-card">
            <img src="<?= base_url('assets/images/dr-kapil-dua.webp') ?>" alt="Dr. Kapil Dua">
            <figcaption class="doc-meta">
              <span class="doc-name" data-qual="MBBS, MS - Chairman & Chief Hair Transplant Surgeon, Member: Past President - ISHRS (USA), AAHRS (Asia), AHRS (India)">
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
            <img src="<?= base_url('assets/images/dr-sohail.webp') ?>" alt="Dr. Suhail Ahmed">
            <figcaption class="doc-meta">
              <span class="doc-name" data-qual="MBBS, MD Dermatalogy, Consultant Dermatologist & Hair Transplant Surgeon">
                Dr. Suhail Ahmed
              </span>
            </figcaption>
          </div>
        </figure>
      </div>

      <button class="rc-arrow rc-next" aria-label="Next doctor" type="button">›</button>
    </div>
  </div>
</section>

<section class="results-section why" aria-labelledby="whyHeading">
  <div class="container">
    <h2 id="whyHeading" class="results-title">Why Choose Us for Hair Transplant in India?</h2>

    <div class="results-divider" aria-hidden="true">
      <span class="line"></span>
      <span class="cross">✚</span>
      <span class="line"></span>
    </div>

    <p class="why-intro">
      We focus on safe, well-planned hair transplant procedures that prioritise precision, natural outcomes, and long-term results.
    </p>

    <div class="why-grid">
      <article class="why-card">
        <div class="why-ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2v6m-4-3h8M7 14h10M5 22h14M9 18h6" />
          </svg>
        </div>
        <h3 class="why-title">Experienced & Qualified Surgeons Only</h3>
        <p class="why-text">Every hair transplant is planned and performed by experienced surgeons with a strong focus on safety, accuracy, and natural outcomes.</p>
      </article>

      <article class="why-card">
        <div class="why-ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 3v6l-4 8a6 6 0 0 0 10 0l-4-8V3" />
            <path d="M16 3c0 6 5 5 5 11a5 5 0 0 1-5 5" />
          </svg>
        </div>
        <h3 class="why-title">Advanced Hair Transplant Techniques</h3>
        <p class="why-text">We use modern Bio-FUE techniques that allow precise graft extraction and implantation for better control and consistency.</p>
      </article>

      <article class="why-card">
        <div class="why-ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 21s-6-4.35-6-9a4 4 0 0 1 7-2 4 4 0 0 1 7 2c0 4.65-6 9-6 9z" />
          </svg>
        </div>
        <h3 class="why-title">Medically Compliant OT Standards</h3>
        <p class="why-text">All procedures are carried out in sterile operation theatres that follow established medical and hygiene protocols.</p>
      </article>

      <article class="why-card">
        <div class="why-ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 10l9-7 9 7v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <path d="M9 22V12h6v10" />
          </svg>
        </div>
        <h3 class="why-title">Natural, Long-Term Results</h3>
        <p class="why-text">Hairlines and graft placement are designed to look natural today and continue to age well as hair loss progresses.</p>
      </article>

      <article class="why-card">
        <div class="why-ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 22s8-3 8-10V5l-8-3-8 3v7c0 7 8 10 8 10z" />
            <path d="M12 7l1.9 3.86 4.26.62-3.08 3 0.73 4.24L12 16.9l-3.81 2 .73-4.24-3.08-3 4.26-.62L12 7z" />
          </svg>
        </div>
        <h3 class="why-title">Patient-Specific Treatment Planning</h3>
        <p class="why-text">Each treatment plan is customised based on hair loss pattern, donor area condition, and long-term restoration goals.</p>
      </article>
    </div>
  </div>
</section>
<!-- 
<section class="journey-sec">
  <div class="container">

    <h2 class="results-title journey-title">Know Your Hair Transplant Cost in India</h2>
    <div class="results-divider journey-divider" aria-hidden="true">
      <span class="line"></span><span class="cross">✚</span><span class="line"></span>
    </div>

    <div class="journey-box" role="form" aria-label="Hair Transplant Cost Calculator">

      <div class="scale-row" role="group" aria-label="Select your baldness stage">
        <button type="button" class="scale-item active" aria-pressed="true">
          <img src="<?= base_url('assets/images/grade-1.webp') ?>" alt="Stage 1"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/Grade-2.webp') ?>" alt="Stage 2"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/Grade-3.webp') ?>" alt="Stage 3"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/Grade-4.webp') ?>" alt="Stage 4"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/Grade-5.webp') ?>" alt="Stage 5"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/Grade-6.webp') ?>" alt="Stage 6"></button>
        <button type="button" class="scale-item"><img src="<?= base_url('assets/images/grade-7.webp') ?>" alt="Stage 7"></button>
      </div>

      <form class="journey-form journey-form--two" action="#" method="post" novalidate>
        <label class="vh" for="jn">Name</label>
        <input class="jf-input" id="jn" type="text" name="name" placeholder="Enter your name" required>

        <label class="vh" for="jp">Phone</label>
        <input class="jf-input" id="jp" type="tel" name="phone" placeholder="Enter 10-digit number" inputmode="numeric" pattern="[0-9]{10}" required>

        <label class="vh" for="je">Email</label>
        <input class="jf-input" id="je" type="email" name="email" placeholder="Enter your email" required>

        <label class="vh" for="jc">City</label>
        <input class="jf-input" id="jc" type="text" name="city" placeholder="Type your city">

        <button type="submit" class="btn-cta btn--block">Calculate Your Hair Transplant Cost</button>
      </form>

    </div>
  </div>
</section> -->
<?= $this->include('partials/hair-transplant-cost') ?>

<!-- Service Section -->
<?= $this->include('partials/service') ?>

<section class="htw-sec">
  <div class="container">
    <h2 class="results-title">How Hair Transplant Surgery Is Planned at IHT?</h2>
    <div class="results-divider">
      <span class="line"></span><span class="cross">+</span><span class="line"></span>
    </div>

    <div class="htw-grid">
      <a class="yt-card"
        href="https://www.youtube.com/watch?v=OXy-9_dtmsE&t=1s"
        data-yid="OXy-9_dtmsE"
        aria-label="Play video: How Hair Transplant Works">
        <img class="yt-thumb"
          src="https://img.youtube.com/vi/OXy-9_dtmsE/maxresdefault.jpg"
          alt="Hair Transplant in India">
        <span class="yt-play" aria-hidden="true">
          <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg">
            <path d="M66.52 7.85a8 8 0 0 0-5.64-5.65C56.1 1 34 1 34 1s-22.1 0-26.88 1.2A8 8 0 0 0 1.48 7.85 83.4 83.4 0 0 0 .28 24a83.4 83.4 0 0 0 1.2 16.15 8 8 0 0 0 5.64 5.65C12.9 47 34 47 34 47s22.1 0 26.88-1.2a8 8 0 0 0 5.64-5.65A83.4 83.4 0 0 0 67.72 24a83.4 83.4 0 0 0-1.2-16.15Z" fill="#212121" opacity=".25"></path>
            <path d="M45 24 27 14v20z" fill="#fff"></path>
          </svg>
        </span>
      </a>

      <div>
        <p class="htw-text">
          Just like any other medical procedure, proper planning is the most crucial step in a hair transplant, as it sets the roadmap for safe surgery and better results. At IHT, the hair transplant process begins with understanding the patient’s concerns, followed by a medical evaluation of hair loss and careful treatment planning. This approach helps achieve natural-looking results while protecting long-term hair stability.
        </p>
        <ul class="feature-list">
          <li>Initial Discussion with Patient Advisor to Understand hair loss concerns and expectations</li>
          <li>Detailed assessment of hair loss pattern, donor area strength, and future hair loss risk by the doctors</li>
          <li>Custom hairline design, graft requirement calculation, and donor area management.</li>
          <li>Choosing the most suitable method (FUE or Bio-FUE) based on individual needs.</li>
          <li>Setting realistic expectations and planning results that develop naturally over time.</li>
        </ul>

        <!-- <div class="htw-cta-box">
          <p class="htw-cta-text">Still have doubts and queries?</p>
          <a class="htw-cta-btn" href="tel:09779944207">Call 09779944207</a>-->
      </div>
    </div>
  </div>
  </div>
</section>


<section class="benefits-section">
  <div class="container">
    <h2 class="results-title">Benefits of Hair Transplant</h2>
    <div class="results-divider">
      <span class="line"></span><span class="cross">+</span><span class="line"></span>
    </div>

    <div class="benefits-grid">
      <article class="benefit-card">
        <figure class="benefit-media">
          <img src="<?= base_url('assets/images/permanent-solution-for-baldness.png') ?>" alt="Long-lasting results">
          <figcaption class="benefit-ribbon">
            <span class="ico" aria-hidden="true">⏳</span>
            <span class="ribbon-title">Permanent Solution for Baldness</span>
          </figcaption>
        </figure>
        <div class="benefit-content">
          <!-- <h3 class="benefit-sub">Sustained improvement</h3> -->
          <p class="benefit-text">Unlike temporary solutions, a hair transplant offers a permanent approach to baldness by restoring natural hair growth in thinning and bald areas.</p>
        </div>
      </article>

      <article class="benefit-card">
        <figure class="benefit-media">
          <img src="<?= base_url('assets/images/cost-effective-long-term.jpg') ?>" alt="Cost-effective over time">
          <figcaption class="benefit-ribbon">
            <span class="ico" aria-hidden="true">💰</span>
            <span class="ribbon-title">Cost-effective Long-term</span>
          </figcaption>
        </figure>
        <div class="benefit-content">
          <!--  <h3 class="benefit-sub">One-time investment</h3> -->
          <p class="benefit-text">Unlike wigs and temporary hair restoration treatments, a hair transplant is a one-time investment that avoids repeated costs and offers better long-term value.</p>
        </div>
      </article>

      <article class="benefit-card">
        <figure class="benefit-media">
          <img src="<?= base_url('assets/images/minimal-downtime.jpg') ?>" alt="Minimal downtime">
          <figcaption class="benefit-ribbon">
            <span class="ribbon-title">Minimal Downtime</span>
          </figcaption>
        </figure>
        <div class="benefit-content">
          <!-- <h3 class="benefit-sub">Back to routine fast</h3> -->
          <p class="benefit-text">With modern techniques, most patients can return to routine daily activities within a short recovery period.</p>
        </div>
      </article>

      <article class="benefit-card">
        <figure class="benefit-media">
          <img src="<?= base_url('assets/images/natural-looking.jpg') ?>" alt="Natural aesthetics">
          <figcaption class="benefit-ribbon">
            <span class="ribbon-title">Natural-looking</span>
          </figcaption>
        </figure>
        <div class="benefit-content">
          <!--   <h3 class="benefit-sub">Designed to suit you</h3> -->
          <p class="benefit-text">Surgeon-planned hairline design ensures results that suit your facial features and continue to look natural as you age.</p>
        </div>
      </article>
    </div>

    <div class="htw-cta-box">
      <p class="htw-cta-text">Explore If Hair Transplant Is Right for You</p>
      <a class="htw-cta-btn" href="tel:09779944207">Call 09779944207</a>
    </div>
  </div>
</section>

<!-- Location Section -->
<?= $this->include('partials/location') ?>

<section class="results-section faq-sec faq--light">
  <div class="container">
    <h2 class="results-title">Frequently Asked Questions - Hair Transplant in India</h2>
    <div class="results-divider">
      <span class="line"></span><span class="cross">+</span><span class="line"></span>
    </div>

    <div class="faq-list" id="faqList">
      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>Is hair transplant in India safe?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Yes, when performed by an experienced hair transplant surgeon with proper hygiene protocols. Safety depends on surgeon involvement, sterile standards, and correct planning.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>How much does a hair transplant cost in India?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          <a href="<?= base_url('hair-transplant-cost') ?>">Hair transplant cost in India</a> typically ranges from Rs. 60,000 to Rs. 4,50,000 but the final cost varies based on graft count, technique (FUE/Bio-FUE), surgeon expertise, and OT standard. A precise estimate is possible only after evaluating hair loss pattern and donor area strength.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>Is hair transplant cost in India calculated per graft?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Many clinics quote per-graft pricing, but the final cost also depends on the technique used, the complexity of the case, and who performs the key surgical steps so it is important to ask what is included in the package.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>How many grafts do I need for a hair transplant?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          It depends on baldness level, donor capacity, hair calibre, and density goals. Many cases fall around 1,500–3,500+ grafts, but the final plan is decided after a doctor’s assessment.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>Which technique is better in India: FUE or Bio-FUE?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Both FUE and Bio-FUE are effective when planned correctly. The “better” technique depends on individual scalp condition, hair loss pattern, and medical assessment, not a one-size-fits-all choice.
          <ul>
            <li><strong>FUE</strong> is suitable for standard cases with good donor density.</li>
            <li><strong>Bio-FUE</strong> is a customised approach that focuses on improved graft handling, hydration, and healing, and may be preferred in selected cases.</li>
          </ul>

        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>Who is the right candidate for a hair transplant?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          You may be a suitable candidate if you:
          <ul>
            <li>Are generally between 25–65 years of age</li>
            <li>Have a stable pattern of hair loss</li>
            <li>Have a healty donor area</li>
            <li>Have realistic expectations about density and coverage</li>
          </ul>
          <p>Final suitability depends on the type of hair loss, donor availability, scalp condition, and future hair loss progression, assessed during consultation.</p>
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>How long does recovery take after a hair transplant?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Most people return to desk work in 2–4 days. Scabs usually shed by day 10–14. Exercise and heavy sweating are typically restricted for a short period as advised by the doctor.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>When will I see hair transplant results?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Most visible hair transplant growth begins after 3 to 4 months. Noticeable improvement is usually seen between 6 to 9 months, while full results may continue to develop up to 12 months or longer depending on the case.</div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>Are hair transplant results permanent?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Transplanted follicles are typically resistant to hair loss, but existing non-transplanted hair can continue to thin with age. Long-term results depend on proper planning and donor management.
        </div>
      </article>

      <article class="faq-item">
        <button class="faq-q" aria-expanded="false">
          <span>How do I choose the best hair transplant clinic in India?</span>
          <i class="faq-ico" aria-hidden="true"></i>
        </button>
        <div class="faq-a" hidden>
          Look for experienced surgeons, medically compliant OT standards, transparent counselling, documented before-after cases, and clear aftercare. Avoid clinics that promise guaranteed density or “too cheap” packages.
        </div>
      </article>
    </div>
  </div>
</section>

<section>


  <aside class="faq-author faq-author--ak">
    <img src="<?= base_url('assets/images/dr-kapil-dua-icon.png') ?>" alt="Dr. Kapil Dua">
    <div class="fa-meta">
      <p class="fa-row"><strong>Reviewed by:</strong> Dr. Kapil Dua</p>
      <p class="fa-row">MBBS, MS - Chairman &amp; Chief Hair Transplant Surgeon</p>
      <p class="fa-row"><strong>Updated on:</strong> March 26, 2026</p>
    </div>
  </aside>

</section>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [

      {
        "@type": "MedicalClinic",
        "name": "IHT Clinic",
        "url": "https://indiahairtransplant.com/",
        "logo": "https://indiahairtransplant.com/assets/images/main_logo.png",
        "telephone": "+91-9779944207",

        "address": {
          "@type": "PostalAddress",
          "addressCountry": "IN"
        },

        "medicalSpecialty": [
          "http://schema.org/Dermatologic"
        ],

        "availableService": [{
            "@type": "MedicalProcedure",
            "name": "FUE Hair Transplant"
          },
          {
            "@type": "MedicalProcedure",
            "name": "Bio-FUE Hair Transplant"
          }
        ]
      },

      {
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "Is hair transplant safe?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Hair transplant is safe when performed by an experienced doctor with proper planning and medical standards."
            }
          },
          {
            "@type": "Question",
            "name": "How much does hair transplant cost in India?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Hair transplant cost in India depends on graft requirement, technique, and clinic standards. Final cost is decided after consultation."
            }
          },
          {
            "@type": "Question",
            "name": "When will I see results after hair transplant?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Hair growth usually starts after a few months, with visible improvement between 6 to 9 months."
            }
          }
        ]
      }

    ]
  }
</script>

<!-- Footer File Include -->

<?= $this->endSection() ?>