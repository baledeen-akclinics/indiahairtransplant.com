<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="iht-about">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ============================================================
       HERO BANNER
  ============================================================ -->
  <section class="page-hero" role="banner" aria-label="Dr. Kapil Dua Banner">
    <div class="container wrap">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">›</span>
        <a href="<?= base_url('our-doctors') ?>">Our Doctors</a>
        <span class="sep">›</span>
        <span aria-current="page">Dr. Kapil Dua</span>
      </nav>
      <h1 class="page-title">Dr. Kapil Dua</h1>
      <p class="page-sub">
        Chairman and Chief Hair Transplant Surgeon, IHT Clinics. The only Indian surgeon to have served as President of ISHRS (USA), President of AAHRS (Asia), and President of AHRS India - leading the field nationally, regionally, and globally.
      </p>
    </div>
  </section>

  <!-- ============================================================
       DOCTOR PROFILE CARD
  ============================================================ -->
  <section class="iht-doc-profile" aria-label="Dr. Kapil Dua Profile Card">
    <div class="container">

      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>

      <div class="docp-card">
        <div class="docp-accent" aria-hidden="true"></div>

        <!-- LEFT: Photo + Contact -->
        <div class="docp-left">
          <figure class="docp-photo">
            <img
              src="<?= base_url('assets/images/dr-kapil-dua.webp') ?>"
              alt="Dr. Kapil Dua, Chairman and Chief Hair Transplant Surgeon at IHT Clinics India"
              width="420" height="520"
              loading="eager"
            >
          </figure>

          <div class="docp-contact">
            <a href="tel:+919779944207" class="docp-link" aria-label="Call IHT Clinics">
              <span class="docp-ico" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6.61-6.88 19.79 19.79 0 0 1-3.07-8.67 2 2 0 0 1 2-2.18h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11l-.91.91a16 16 0 0 0 6.29 6.29l.91-.91a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7a2 2 0 0 1 1.72 2.02z"/></svg>
              </span>
              +91-97799-44207
            </a>
            <a href="https://wa.me/919779944207" class="docp-link" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp IHT Clinics">
              <span class="docp-ico" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15s-.77.97-.94 1.16c-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.4-1.48-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.87 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35zm-5.42 7.4h-.004a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.82 9.82 0 0 1 2.89 6.99c-.003 5.45-4.44 9.88-9.89 9.88zm8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.005c6.55 0 11.89-5.34 11.89-11.89A11.82 11.82 0 0 0 20.46 3.48z"/></svg>
              </span>
              WhatsApp Us
            </a>
            <a href="<?= base_url('contact') ?>" class="docp-link" aria-label="Our clinic locations">
              <span class="docp-ico" aria-hidden="true">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </span>
              Delhi · Ludhiana · Bangalore
            </a>
          </div>

          <div class="docp-actions">
            <a href="<?= base_url('contact') ?>" class="docp-btn docp-btn--primary">Book Consultation</a>
            <a href="tel:+919779944207" class="docp-btn docp-btn--ghost">Call Now</a>
          </div>
        </div>

        <!-- RIGHT: Bio -->
        <div class="docp-right">
          <div class="docp-head">
            <h2 class="docp-name">Dr. Kapil Dua</h2>
            <p class="docp-cred">MBBS, MS | Chairman &amp; Chief Hair Transplant Surgeon<br>Past President: ISHRS (USA) · AAHRS (Asia) · AHRS India | Diplomate, ABHRS</p>
          </div>

          <div class="docp-highlight">
            <p>The first and only Indian hair transplant surgeon elected as President of ISHRS (USA) - the world's foremost body for hair restoration surgery. Dr. Kapil Dua brings over 25 years of surgical experience, more than 5 million follicles transplanted, and an internationally respected approach to every case he handles.</p>
          </div>

          <p class="docp-text">
          With a medical practice defined by surgical precision, long-term patient planning, and meaningful contributions to global hair restoration science, Dr Kapil Dua is widely considered among the most credentialed hair transplant surgeons practising in India today. 
          </p>

          <p class="docp-sub">Credentials at a Glance</p>
          <ul class="docp-list">
            <li>25+ years of experience in hair transplant surgery and restoration planning</li>
            <li>5 million+ hair follicles transplanted with less than 3% documented graft wastage</li>
            <li>Past President, ISHRS, USA (2022-23) - the first Indian to hold this office</li>
            <li>President, Asian Association of Hair Restoration Surgeons (AAHRS), 2024</li>
            <li>Past President and Founding Member, AHRS India</li>
            <li>Diplomate, American Board of Hair Restoration Surgery (ABHRS)</li>
            <li>Fellowship in Hair Transplant Surgery under Dr. Alex Ginzburg, Tel Aviv, Israel</li>
          </ul>

          <div class="docp-badges">
            <span class="docp-badge">Past President, ISHRS USA</span>
            <span class="docp-badge">President, AAHRS 2024</span>
            <span class="docp-badge">ABHRS Diplomate</span>
            <span class="docp-badge">FISHRS, USA</span>
            <span class="docp-badge">25+ Years Experience</span>
            <span class="docp-badge">5M+ Follicles</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ABOUT SECTION
  ============================================================ -->
  <section class="internal-white">
    <div class="container">
      <h2 class="results-title">About Dr. Kapil Dua</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
           Dr Kapil Dua is the Chairman and Chief Hair Transplant Surgeon at IHT Clinics, with more than 25 years of clinical experience in hair restoration surgery and planning. His experience spans all stages of surgical hair restoration, from carefully designed hairlines in early-stage cases to complex, multi-session planning for advanced Grade 6 and Grade 7 baldness, which demands a high level of donor management expertise and long-term strategic thinking. 
          </p>
          <p class="cs-text">
            He is widely recognised as one of the early adopters of FUE (Follicular Unit Extraction), the stripless hair transplant method, in India, having begun work with the technique in 2007 at a time when it was largely unfamiliar to practitioners in the country. His early focus on mastering FUE, combined with a commitment to refining the procedure through ongoing clinical research and international collaboration, placed him at the forefront of the technique's adoption across South Asia.
          </p>
          <p class="cs-text">
            In 2022, he became the first Indian surgeon ever to be elected President of the International Society of Hair Restoration Surgery (ISHRS), USA, the world's most respected organisation for hair restoration surgeons, and served in that role through 2023. In 2024, he was appointed President of the Asian Association of Hair Restoration Surgeons (AAHRS), making him the only surgeon from India to have held the top leadership position in national, regional, and global hair restoration bodies at different points in his career.
          </p>
          <p class="cs-text">
            What sets Dr Kapil Dua apart is not only the number of procedures he has performed or the leadership roles he has held, but the way he plans each case. Whether it is a 1,500-graft hairline case or a complex Grade 7 revision with a limited donor area, every case is assessed carefully with a focus on long-term results. </p>
           
           <p class="cs-text">He practices at IHT Clinic locations in <a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a>, <a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a>, and <a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a>,. Many patients travel from different cities and countries to consult him because in advanced hair transplant cases, the surgeon’s experience, judgement, and donor area management can make a major difference to the final outcome. </p>
           </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CREDENTIALS AND EDUCATION
  ============================================================ -->
  <section class="internal-grey">
    <div class="container">
      <h2 class="results-title">Education, Qualifications &amp; Academic Contributions</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Dr. Kapil Dua's academic foundation combines formal surgical training, an international fellowship under one of Israel's most respected hair transplant surgeons, and ongoing contributions to published research and medical education in the field. His credentials span clinical practice, board certification, editorial leadership, and international research.
          </p>
          <ul class="feature-list">
            <li>MBBS, MS (Master of Surgery)</li>
            <li>Fellowship in Hair Transplant Surgery under Dr. Alex Ginzburg, Tel Aviv, Israel</li>
            <li>Diplomate, American Board of Hair Restoration Surgery (ABHRS)</li>
            <li>Fellow, International Society of Hair Restoration Surgery (FISHRS, USA)</li>
            <li>Founding Member, Association of Hair Restoration Surgeons of India (AHRS India)</li>
            <li>Member, American Hair Loss Association</li>
            <li>Member, Indian Medical Association (IMA)</li>
            <li>Co-editor, Textbook on Hair Transplantation (JP Publishers)</li>
            <li>Principal Investigator, International Research Studies on FUE (ISHRS and IRB, USA)</li>
            <li>Workshop Director, Ethnic Considerations in Hair Restoration, 21st ISHRS Annual Scientific Meeting, San Francisco</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       GLOBAL LEADERSHIP
  ============================================================ -->
  <section class="internal-white">
    <div class="container">
      <h2 class="results-title">Global Leadership in Hair Restoration</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
           Dr. Kapil Dua is among the few Indian hair transplant surgeons to have held leadership roles across national, Asian, and international hair restoration organisations. These organisations play an important role in advancing hair restoration by developing educational programmes, promoting research, encouraging scientific collaboration, and supporting high standards of patient care worldwide.
          </p>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 10px;">Presidential Roles</h3>
          <ul class="docp-list" style="margin-bottom:20px;">
            <li><strong>Past President, ISHRS (International Society of Hair Restoration Surgery), USA - 2022 to 2023.</strong> The first Indian surgeon in history elected to this position. ISHRS is the world's leading professional body for hair restoration surgeons.</li>
            <li><strong>President, Asian Association of Hair Restoration Surgeons (AAHRS) - 2024.</strong> Announced at the 8th AAHRS Annual Scientific Meeting held in China. Focused on expanding educational standards and surgical collaboration across Asia.</li>
            <li><strong>Past President and Founding Member, Association of Hair Restoration Surgeons of India (AHRS India) - 2016 to 2017.</strong> Played a key role in founding and building India's national hair restoration body.</li>
          </ul>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 10px;">Board and Committee Roles</h3>
          <ul class="docp-list" style="margin-bottom:20px;">
            <li>Board of Governors, ISHRS (USA) - 2017 to 2019</li>
            <li>Board of Governors, AAHRS (Asia) - since 2014</li>
            <li>Member, FUE Advancement Committee, ISHRS - since 2014</li>
            <li>Member, Membership Committee, ISHRS - since 2016</li>
            <li>Program Director, first ISHRS Regional Workshop held in India</li>
          </ul>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 10px;">International Conference Participation</h3>
          <p class="cs-text">
            Dr. Kapil Dua has delivered lectures, conducted live surgery demonstrations, and served as faculty at international conferences in China, Thailand, Dubai, the United Kingdom, Panama, and across India. He has participated as a speaker and faculty member at multiple consecutive ISHRS Annual Scientific Meetings and contributed to the scientific development of FUE surgical technique standards through peer-reviewed publications and collaborative research.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       ASSOCIATION LOGOS STRIP
  ============================================================ -->
  <section style="background:#f9fafb; border-top:1px solid #eef2f8; border-bottom:1px solid #eef2f8; padding:36px 0;">
    <div class="container">
      <p style="text-align:center; font:700 12px/1.3 Inter,sans-serif; letter-spacing:.08em; color:#9ca3af; text-transform:uppercase; margin:0 0 28px;">Professional Memberships &amp; Affiliations</p>
      <div style="display:flex; flex-wrap:wrap; align-items:flex-end; justify-content:center; gap:24px 40px;">

        <!-- ISHRS -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); overflow:hidden; display:flex; align-items:center; justify-content:center; padding:10px;">
            <img src="<?= base_url('assets/images/ISHRS.webp') ?>" alt="ISHRS - International Society of Hair Restoration Surgery" width="70" height="86" loading="lazy" style="width:100%; height:100%; object-fit:contain; display:block;">
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">ISHRS</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">Fellow &amp; Past President</span>
          </div>
        </div>

        <!-- AAHRS -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); overflow:hidden; display:flex; align-items:center; justify-content:center; padding:10px;">
            <img src="<?= base_url('assets/images/AAHRS.webp') ?>" alt="AAHRS - Asian Association of Hair Restoration Surgeons" width="70" height="86" loading="lazy" style="width:100%; height:100%; object-fit:contain; display:block;">
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">AAHRS</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">President 2024</span>
          </div>
        </div>

        <!-- ABHRS -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); overflow:hidden; display:flex; align-items:center; justify-content:center; padding:10px;">
            <img src="<?= base_url('assets/images/ABHRS.webp') ?>" alt="ABHRS - American Board of Hair Restoration Surgery" width="70" height="86" loading="lazy" style="width:100%; height:100%; object-fit:contain; display:block;">
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">ABHRS</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">Diplomate</span>
          </div>
        </div>

        <!-- AHRS India -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); overflow:hidden; display:flex; align-items:center; justify-content:center; padding:10px;">
            <img src="<?= base_url('assets/images/AHRS.webp') ?>" alt="AHRS India - Association of Hair Restoration Surgeons of India" width="70" height="86" loading="lazy" style="width:100%; height:100%; object-fit:contain; display:block;">
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">AHRS India</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">Founder &amp; Past President</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       BIO-FUE TECHNIQUE
  ============================================================ -->
  <section class="internal-grey">
    <div class="container">
      <h2 class="results-title">Bio-FUE®: IHT's Trademarked Approach to Hair Restoration</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Over the years of clinical experience, Dr Kapil Dua and his team at IHT developed Bio-FUE as a trademarked hair transplant procedure built on the principles of FUE, with an additional focus on graft protection, survival, and long-term results.

          </p>
          <p class="cs-text">
            Bio-FUE combines customised extraction tools and addresses the two most common causes of graft compromise. The technique also incorporates bio-therapy as part of the overall treatment protocol to promote graft viability and healing.

          </p>
           <p class="cs-text">
            By addressing some of the common factors that can affect graft survival, Bio-FUE aims to maximise the viability of transplanted follicles and has demonstrated success rates of up to 95% in suitable candidates when performed with appropriate surgical planning and post-procedure care.
          </p>
          <ul class="feature-list">
                <li>Customised extraction tools designed for follicular-level precision</li>
                <li>Reduced out-of-body time between extraction and implantation</li>
                <li>Improved graft survival through careful handling protocols</li>
                <li>Bio-therapy support as part of the treatment protocol</li>
                <li>Suitable for scalp, beard, eyebrow, and body hair transplant procedures</li>
                <li>Suitable for advanced grades of baldness</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       WHY CHOOSE DR. KAPIL (accordion style like site pattern)
  ============================================================ -->
  <section class="internal-white">
    <div class="container">
      <h2 class="results-title">Clinical Expertise and Areas of Focus</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Dr. Kapil Dua's practice is built around a structured, case-specific approach where every decision, from hairline position and graft count to donor management and session planning, is made with the patient's long-term picture in mind. Patients travel from across the country to consult him at IHT Clinics, including those from <a href="<?= base_url('hair-transplant-in-chandigarh') ?>">Chandigarh</a>, <a href="<?= base_url('hair-transplant-in-gurgaon') ?>">Gurgaon</a>, <a href="<?= base_url('hair-transplant-in-noida') ?>">Noida</a>, and <a href="<?= base_url('hair-transplant-in-mohali') ?>">Mohali</a>, who visit IHT Clinics for their hair transplant specifically because of the level of surgical expertise and planning discipline available here.
          </p>

          <div class="iht-acc" data-accordion="multi">
            <div class="iht-acc-shell">
              <div class="iht-acc-cols">

                <div class="iht-acc-col">

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Hairline Design and Density Planning</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Every hairline Dr. Kapil Dua designs is planned around the patient's facial anatomy, current age, expected hair loss progression, and long-term donor capacity. Angle, direction, depth, and density are all mapped before any surgical step begins. The goal is a result that looks right not just at one year post-op, but across decades.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Advanced and High-Grade Baldness Cases</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Dr. Kapil Dua is internationally recognised for managing Grade 5, 6, and 7 baldness cases. These require a level of donor planning, graft calculation, and realistic expectation-setting that most clinics are not equipped to handle. He takes on complex cases through careful evaluation and, where necessary, staged surgical planning that preserves donor area health for future sessions.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Corrective and Revision Hair Transplant</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Patients who have had unsatisfactory results elsewhere - pluggy grafts, unnatural hairlines, mismatched density, or over-harvested donor areas - consult Dr. Kapil Dua for revision work. These are among the most demanding cases in hair restoration, requiring thorough assessment before any corrective procedure is planned, and he approaches them with the same structural discipline as primary transplants.</p>
                    </div>
                  </div>

                </div>

                <div class="iht-acc-col">

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Beard, Eyebrow and Body Hair Restoration</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Hair in different areas of the face and body grows at unique angles, textures, and rates. Dr. Kapil Dua customises the extraction and implantation approach for each specialised restoration, whether that involves <a href="<?= base_url('beard-transplant') ?>">beard transplant</a>, <a href="<?= base_url('eyebrow-hair-transplant') ?>">eyebrow restoration</a>, or body hair procedures, ensuring growth patterns look natural within the specific zone being treated.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Conservative Long-Term Donor Management</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>The donor zone is a finite resource. Dr. Kapil Dua is deliberate about how grafts are extracted and at what density, ensuring the scalp does not show signs of over-harvesting and that future sessions - if ever needed - remain viable. This conservative approach is one of the key differences between results that hold up over 10 to 15 years and those that begin to look sparse and patchy.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">International Patient Consultations</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Patients from the UK, Middle East, Southeast Asia, and other countries travel specifically to consult Dr. Kapil Dua at IHT Clinics. Within India, patients from cities without a local IHT clinic, including those from <a href="<?= base_url('hair-transplant-in-jalandhar') ?>">Jalandhar</a>, <a href="<?= base_url('hair-transplant-in-jaipur') ?>">Jaipur</a>, and <a href="<?= base_url('hair-transplant-in-meerut') ?>">Meerut</a>, also travel to the Delhi, Ludhiana, or Bangalore clinic for treatment, choosing the surgeon over proximity when results matter most.</p>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       FAQ SECTION - using exact site pattern (faq-sec / faq-item)
  ============================================================ -->
  <section class="results-section faq-sec faq--light">
    <div class="container">
      <h2 class="results-title">Frequently Asked Questions about Dr. Kapil Dua</h2>
      <div class="results-divider">
        <span class="line"></span><span class="cross">+</span><span class="line"></span>
      </div>

      <div class="faq-list" id="faqList">
        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>What makes Dr. Kapil Dua stand apart from other hair transplant surgeons in India?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
           Dr Kapil Dua is the only Indian hair transplant surgeon to have served as President of ISHRS, AAHRS, and AHRS India, representing global, Asian, and national leadership in hair restoration. Beyond these positions, his strength lies in how he assesses each case, protects the donor area, and plans results that remain natural over time.

          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Does Dr. Kapil Dua personally perform the surgery or do technicians handle it?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Dr. Kapil Dua personally performs all critical steps of the hair transplant procedure in line with the surgical standards set by the International Society of Hair Restoration Surgery (ISHRS). This includes scalp assessment, hairline design, extraction planning, and graft placement - each step carried out by the surgeon, as international guidelines recommend for safe and predictable outcomes.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Can patients who had a poor result elsewhere consult Dr. Kapil Dua for correction?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Yes. Dr. Kapil Dua regularly evaluates patients who are unhappy with previous transplants, whether due to unnatural hairlines, low density, plug-like grafts, or donor area damage. Corrective procedures require a thorough assessment first to understand what is achievable given the existing state of the scalp and donor zone. He is experienced in working through these constraints to plan realistic corrections.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>What is Bio-FUE and how does it differ from standard FUE hair transplant?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Bio-FUE is a procedural refinement of the standard FUE technique, developed by Dr. Kapil Dua and his team. The key differences are at the instrument and handling protocol level: modified extraction tools, tighter graft handling to reduce trauma, and reduced out-of-body time for extracted grafts. These adjustments improve graft survival rates and overall result quality in a measurable way. It is not a marketing label but reflects specific documented changes to the procedure.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>How can I book a consultation with Dr. Kapil Dua?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            You can book a consultation by calling or WhatsApping us at <strong>+91-97799-44207</strong>. Our team will help schedule an appointment at the clinic location most convenient for you - whether that is <a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a>, <a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a>, or <a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a>. You can also submit a request through our contact page and we will follow up to confirm a time.
          </div>
        </article>

      </div><!-- /.faq-list -->

      <!-- FAQ Author Card -->
      <div class="faq-author faq-author--ak" style="margin-top:28px;">
        <img src="<?= base_url('assets/images/dr-kapil-dua.webp') ?>" alt="Dr. Kapil Dua" style="width:84px; height:84px; border-radius:50%; object-fit:cover;">
        <div class="fa-meta">
          <div class="fa-row"><strong>Dr. Kapil Dua</strong></div>
          <div class="fa-row">MBBS, MS | Chairman, IHT Clinics</div>
          <div class="fa-row" style="margin-top:4px; color:#64748b;">Past President, ISHRS USA · President, AAHRS 2024 · 25+ Years Experience</div>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================================
       CTA STRIP
  ============================================================ -->
  <section class="iht-cta-strip">
    <div class="container iht-cta-wrap">
      <p class="iht-cta-text">
        Consult Dr. Kapil Dua for an honest, expert assessment of your hair restoration options.
      </p>
      <a href="tel:+919779944207" class="iht-cta-btn">Call +91-97799-44207</a>
    </div>
  </section>

  <!-- ============================================================
       PERSON SCHEMA JSON-LD
  ============================================================ -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Dr. Kapil Dua",
    "jobTitle": "Chairman and Chief Hair Transplant Surgeon",
    "description": "India's most credentialed hair transplant surgeon. Past President of ISHRS (USA) 2022-23, the first Indian to hold this global position. President of AAHRS (Asia) 2024. Over 25 years of surgical experience with 5 million plus follicles transplanted. Practices at IHT Clinics in Delhi, Ludhiana, and Bangalore.",
    "image": "https://indiahairtransplant.com/assets/images/dr-kapil-dua.webp",
    "url": "https://indiahairtransplant.com/dr-kapil-dua",
    "telephone": "+919779944207",
    "worksFor": {
      "@type": "MedicalOrganization",
      "name": "IHT Clinics - India Hair Transplant",
      "url": "https://indiahairtransplant.com"
    },
    "memberOf": [
      { "@type": "Organization", "name": "International Society of Hair Restoration Surgery (ISHRS), USA" },
      { "@type": "Organization", "name": "Asian Association of Hair Restoration Surgeons (AAHRS)" },
      { "@type": "Organization", "name": "American Board of Hair Restoration Surgery (ABHRS)" },
      { "@type": "Organization", "name": "Association of Hair Restoration Surgeons of India (AHRS India)" },
      { "@type": "Organization", "name": "Indian Medical Association (IMA)" }
    ],
    "award": [
      "Past President, ISHRS USA (2022-23) - first Indian to hold this position",
      "President, Asian Association of Hair Restoration Surgeons (AAHRS) 2024"
    ],
    "knowsAbout": ["Hair Transplant Surgery","FUE Hair Transplant","Bio-FUE","Corrective Hair Transplant","Beard Transplant","Eyebrow Transplant","Hair Restoration Planning"],
    "sameAs": [
      "https://ishrs.org/doctor/49999/",
      "https://www.linkedin.com/in/drkapildua/"
    ]
  }
  </script>

</div>

<?= $this->endSection() ?>
