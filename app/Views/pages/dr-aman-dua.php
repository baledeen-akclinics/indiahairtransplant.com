<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="iht-about">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ============================================================
       HERO BANNER
  ============================================================ -->
  <section class="page-hero" role="banner" aria-label="Dr. Aman Dua Banner">
    <div class="container wrap">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">›</span>
        <a href="<?= base_url('our-doctors') ?>">Our Doctors</a>
        <span class="sep">›</span>
        <span aria-current="page">Dr. Aman Dua</span>
      </nav>
      <h1 class="page-title">Dr. Aman Dua</h1>
      <p class="page-sub">
        Co-Founder of IHT Clinics. One of India's best dermatologists specialising in hair restoration, hair loss diagnosis, and regenerative treatments. India's first female hair transplant surgeon, with over 20 years of clinical and academic experience.
      </p>
    </div>
  </section>

  <!-- ============================================================
       DOCTOR PROFILE CARD
  ============================================================ -->
  <section class="iht-doc-profile" aria-label="Dr. Aman Dua Profile Card">
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
              src="<?= base_url('assets/images/dr-aman-dua.webp') ?>"
              alt="Dr. Aman Dua, Co-Founder of IHT Clinics and India's first female hair transplant surgeon"
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
              Delhi · Ludhiana
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
            <h2 class="docp-name">Dr. Aman Dua</h2>
            <p class="docp-cred">MBBS, MD (Dermatology) | Co-Founder, IHT Clinics<br>Fellow ISHRS, USA | Past President &amp; Founder Member, AHRS India | Gold Medalist</p>
          </div>

          <div class="docp-highlight">
            <p>India's first female hair transplant surgeon and one of the country's best dermatologists specialising in hair restoration. The first Indian female doctor to present a research paper on hair transplant at an international conference. Over 20 years of clinical experience in hair loss diagnosis, medical management, and regenerative hair therapies.</p>
          </div>

          <p class="docp-text">
            Dr. Aman Dua brings a rigorous, diagnosis-led perspective to hair restoration - one that begins with understanding why hair is falling before deciding on how it should be treated. Her dual expertise in dermatology and hair transplant surgery gives patients access to a complete view of their condition rather than being pushed toward a single treatment option from the outset.
          </p>

          <p class="docp-sub">Credentials at a Glance</p>
          <ul class="docp-list">
            <li>20+ years of clinical experience in dermatology and hair restoration</li>
            <li>India's first female hair transplant surgeon</li>
            <li>MBBS, MD (Dermatology), Dayanand Medical College and Hospital, Ludhiana</li>
            <li>Gold Medalist in Pharmacology and Microbiology</li>
            <li>Fellow, International Society of Hair Restoration Surgery (FISHRS, USA)</li>
            <li>Past President and Founder Member, AHRS India</li>
            <li>Founder Editor, Journal of AHRS India</li>
            <li>First Indian female doctor to present a research paper on hair transplant internationally</li>
          </ul>

          <div class="docp-badges">
            <span class="docp-badge">India's First Female HT Surgeon</span>
            <span class="docp-badge">FISHRS, USA</span>
            <span class="docp-badge">Past President, AHRS India</span>
            <span class="docp-badge">Gold Medalist</span>
            <span class="docp-badge">20+ Years Experience</span>
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
      <h2 class="results-title">About Dr. Aman Dua</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
           Dr Aman Dua is the Co-Founder of IHT Clinics and one of India’s experienced dermatologists, with over two decades of work in hair loss diagnosis, dermatological treatment, and hair restoration. She is also recognised as India’s first female hair transplant surgeon, a distinction that reflects her early contributions to a speciality in which very few women were practising at the time.</p>

            <p class="cs-text">Dr Aman Dua’s approach to hair restoration starts with understanding the underlying cause of hair loss before recommending any treatment. Before advising a surgical or non-surgical option, she carefully reviews the patient’s hair loss pattern, scalp condition, medical history, and stage of hair loss. This helps determine whether hair fall is related to genetics, hormonal changes, nutritional deficiencies, thyroid imbalance, stress, or other underlying causes.</p>

            <p class="cs-text">This matters because not every patient with hair loss needs the same treatment. Some may need medicines, some may benefit from regenerative therapies, and some may require hair transplant surgery at the right stage. By identifying the cause first, Dr Aman Dua helps patients avoid unnecessary procedures and choose a treatment plan that is better suited to their actual condition.</p>
            <p class="cs-text">
           If you are experiencing hair loss, hair thinning, excessive shedding, or any other hair and scalp concern, a consultation with Dr Aman Dua can help identify the underlying cause and the most appropriate treatment approach. Based on your hair loss pattern, stage of hair loss, scalp condition, and expectations, she can help you understand the most suitable treatment options for your specific case and long-term goals.</p>

          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PIONEER MILESTONE (grey)
  ============================================================ -->
  <section class="internal-grey">
    <div class="container">
      <h2 class="results-title">A Record of Firsts in Indian Hair Restoration</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Dr. Aman Dua's career is defined by a series of contributions that were genuinely firsts for women in Indian hair restoration. Beyond the clinical work, she invested in building the academic and institutional structures that help establish hair restoration as a recognised medical speciality in India, through editorial leadership, research, and sustained participation in national and international scientific platforms.
          </p>
          <ul class="feature-list">
            <li>India's first female hair transplant surgeon</li>
            <li>First Indian female doctor to present a research paper on hair transplant at an international conference</li>
            <li>Founder Editor of the Journal of AHRS India - the first peer-reviewed publication for Indian hair restoration surgeons</li>
            <li>Past President and Founder Member of AHRS India</li>
            <li>Gold Medalist in Pharmacology and Microbiology</li>
            <li>Former Assistant Professor, Dayanand Medical College and Hospital, Ludhiana</li>
            <li>Recognised at HairCon and multiple national and international scientific forums</li>
            <li>Co-author of research papers and books published in national and international journals</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       EDUCATION AND CREDENTIALS (white)
  ============================================================ -->
  <section class="internal-white">
    <div class="container">
      <h2 class="results-title">Qualifications, Memberships &amp; Academic Contributions</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Dr. Aman Dua graduated as a Gold Medalist in Pharmacology and Microbiology from Dayanand Medical College and Hospital (DMC), Ludhiana, one of India's most respected medical institutions, where she also served as an Assistant Professor after completing her MD in Dermatology. Her academic record reflects the same standard of rigour she brings to clinical practice.
          </p>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 8px;">Academic Qualifications</h3>
          <ul class="docp-list" style="margin-bottom:18px;">
            <li>MBBS, Dayanand Medical College and Hospital (DMC), Ludhiana</li>
            <li>MD (Dermatology), Dayanand Medical College and Hospital (DMC), Ludhiana</li>
            <li>Gold Medalist in Pharmacology and Microbiology</li>
            <li>Former Assistant Professor, Dayanand Medical College and Hospital, Ludhiana</li>
          </ul>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 8px;">Professional Memberships and Leadership</h3>
          <ul class="docp-list" style="margin-bottom:18px;">
            <li>Fellow, International Society of Hair Restoration Surgery (FISHRS, USA)</li>
            <li>Past President and Board of Governors, Association of Hair Restoration Surgeons of India (AHRS India)</li>
            <li>Founder Member, AHRS India</li>
            <li>Founder Editor, Journal of AHRS India</li>
          </ul>

          <h3 style="color:#0F1831; font:700 16px/1.4 Inter,sans-serif; margin:18px 0 8px;">Research and Conference Activity</h3>
          <ul class="docp-list">
            <li>First Indian female doctor to present a research paper on hair transplant at an international conference</li>
            <li>Co-author of multiple research papers published in national and international journals</li>
            <li>Co-author of published books on hair restoration</li>
            <li>Active speaker and participant at national and international conferences including HairCon</li>
            <li>Regular contributor to scientific discussions on evolving treatment protocols in hair restoration</li>
          </ul>
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
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">Fellow (FISHRS)</span>
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

        <!-- DMC (text badge, no logo provided) -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); display:flex; flex-direction:column; align-items:center; justify-content:center; padding:10px; gap:4px;">
            <span style="font:800 18px/1 Inter,sans-serif; color:#0d5c2f;">DMC</span>
            <span style="font:500 9px/1.3 Inter,sans-serif; color:#5c657a; text-align:center;">Ludhiana</span>
            <span style="font:500 9px/1.3 Inter,sans-serif; color:#5c657a; text-align:center;">MD Dermatology</span>
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">DMC</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">MD Dermatology</span>
          </div>
        </div>

        <!-- Journal AHRS (text badge, no logo provided) -->
        <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
          <div style="width:90px; height:110px; border-radius:14px; background:#fff; border:1px solid #e7edf4; box-shadow:0 4px 18px rgba(0,0,0,.07); display:flex; flex-direction:column; align-items:center; justify-content:center; padding:10px; gap:4px;">
            <span style="font:800 11px/1.3 Inter,sans-serif; color:#1a2e5a; text-align:center;">Journal<br>AHRS India</span>
            <span style="font:500 9px/1.3 Inter,sans-serif; color:#5c657a; text-align:center; margin-top:4px;">Founder Editor</span>
          </div>
          <div style="text-align:center;">
            <span style="display:block; font:700 12px/1.3 Inter,sans-serif; color:#121a2c;">J-AHRS India</span>
            <span style="display:block; font:400 11px/1.4 Inter,sans-serif; color:#9ca3af; margin-top:2px;">Founder Editor</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       EXPERTISE - ACCORDION (grey)
  ============================================================ -->
  <section class="internal-grey">
    <div class="container">
      <h2 class="results-title">Clinical Expertise and Areas of Focus</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">✚</span><span class="line"></span>
      </div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
           Patients from Amritsar, Chandigarh, Mohali, and other parts of North India regularly visit IHT Clinics to seek her expert opinion, honest guidance, and stage-wise treatment planning. Whether a patient requires medical management, regenerative therapies, hair transplant surgery, or a combination of treatments, her goal is to help them make informed decisions and choose the most suitable treatment path based on their hair loss pattern, stage of hair loss, and expectations. 
          </p>

          <div class="iht-acc" data-accordion="multi">
            <div class="iht-acc-shell">
              <div class="iht-acc-cols">

                <div class="iht-acc-col">

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Hair Loss Diagnosis and Root Cause Assessment</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>A hair transplant is only appropriate when the right type of hair loss is present. Dr. Aman Dua begins every patient's journey with a structured evaluation of their hair loss history, scalp condition, hormonal profile, nutritional status, and family background. This diagnostic first step shapes all subsequent decisions, ensuring patients receive treatment matched to the actual cause of their hair loss rather than a blanket solution.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Medical Management and Non-Surgical Treatment</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Many hair loss conditions respond well to medical treatment before any surgical consideration is raised. Dr. Aman Dua prescribes and monitors evidence-based medical protocols including topical and systemic treatments, nutritional supplementation, and scalp health management programmes, tailoring each plan to the individual based on diagnosis and ongoing response to treatment.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Female Hair Loss - Specialist Assessment</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Hair loss in women is more diagnostically complex than male pattern baldness. Causes are often multifactorial, involving hormonal shifts, thyroid conditions, post-pregnancy changes, iron deficiency, PCOS, or autoimmune triggers. As a dermatologist and the country's first female hair transplant surgeon, Dr. Aman Dua is uniquely positioned to evaluate female hair loss with the clinical depth it demands. She guides women through diagnosis, medical management, and where appropriate, <a href="<?= base_url('female-hair-transplant') ?>" style="color:rgba(255,255,255,.88); text-decoration:underline;">female hair transplant</a> planning.</p>
                    </div>
                  </div>

                </div>

                <div class="iht-acc-col">

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">PRP and GFC Regenerative Therapy</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Dr. Aman Dua administers both <a href="<?= base_url('prp-hair-treatment') ?>" style="color:rgba(255,255,255,.88); text-decoration:underline;">PRP (Platelet-Rich Plasma)</a> and <a href="<?= base_url('gfc-hair-treatment') ?>" style="color:rgba(255,255,255,.88); text-decoration:underline;">GFC (Growth Factor Concentrate)</a> therapy for patients experiencing active hair shedding, thinning, or looking to support the health of existing follicles before they consider surgery. These non-surgical treatments are prescribed after a proper assessment of suitability and are administered as part of a broader treatment plan rather than as standalone quick fixes.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Pre and Post-Transplant Planning and Support</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>For patients pursuing a <a href="<?= base_url('hair-transplant') ?>" style="color:rgba(255,255,255,.88); text-decoration:underline;">hair transplant</a>, Dr. Aman Dua plays a significant role in pre-surgical evaluation, determining whether the patient's health baseline is appropriate for surgery, and in post-operative care planning, monitoring graft recovery, prescribing appropriate medications, and guiding long-term maintenance to protect both transplanted and existing hair.</p>
                    </div>
                  </div>

                  <div class="iht-acc-item">
                    <button class="iht-acc-q" type="button" aria-expanded="false">
                      <span class="iht-acc-title">Long-Term Hair Restoration Strategy</span>
                      <span class="iht-acc-ico" aria-hidden="true"></span>
                    </button>
                    <div class="iht-acc-a" hidden>
                      <p>Hair restoration is not a one-time event. For most patients, maintaining the results of any surgical or non-surgical treatment requires an ongoing strategy that addresses continuing hair loss, scalp health, and response to treatment over time. Dr. Aman Dua works with patients on a long-term basis, adjusting treatment protocols as their hair condition evolves, to ensure that results hold up and that existing hair density is preserved alongside any restoration that has been completed.</p>
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
       FAQ SECTION - exact site pattern (faq-sec / faq-item)
  ============================================================ -->
  <section class="results-section faq-sec faq--light">
    <div class="container">
      <h2 class="results-title">Frequently Asked Questions about Dr. Aman Dua</h2>
      <div class="results-divider">
        <span class="line"></span><span class="cross">+</span><span class="line"></span>
      </div>

      <div class="faq-list" id="faqList">

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>What is Dr. Aman Dua's primary area of expertise in hair restoration?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Dr. Aman Dua specialises in hair loss diagnosis and the full medical management side of hair restoration. Her expertise covers identifying the cause of hair loss through structured dermatological evaluation, prescribing non-surgical treatments, administering PRP and GFC regenerative therapies, and guiding patients through pre- and post-transplant care. She is particularly experienced in female hair loss, where hormonal and systemic factors require evaluation beyond what a standard transplant consultation covers.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Should I consult Dr. Aman Dua or Dr. Kapil Dua first?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Both doctors work together and many patients benefit from being evaluated by both. If you are in the early stages of hair loss, unsure about the cause, experiencing diffuse thinning, or exploring non-surgical options like PRP or GFC, a consultation with Dr. Aman Dua is typically the right starting point. If you are already at a stage where surgery is being seriously considered, our team will coordinate both specialists in your case as needed.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Is Dr. Aman Dua the right specialist for women experiencing hair loss?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Yes. As a dermatologist with over 20 years of experience and India's first female hair transplant surgeon, Dr. Aman Dua is exceptionally well-equipped to evaluate and treat women experiencing hair thinning, scalp hair loss, post-pregnancy shedding, or hormonally triggered hair fall. She can also guide female patients on whether a female hair transplant is medically appropriate for their specific condition.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>What happens during a consultation with Dr. Aman Dua?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            The consultation begins with a review of your hair loss history, current scalp condition, overall health background, and any previous treatments you may have tried. Dr. Aman Dua uses this clinical picture to identify the likely cause of your hair loss and recommends a treatment plan tailored to your specific situation. This may involve medical management alone, regenerative therapy, or a referral for surgical planning with Dr. Kapil Dua where surgery is appropriate.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Does Dr. Aman Dua also perform hair transplant surgery?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
            Dr. Aman Dua is India's first female hair transplant surgeon and is trained in surgical hair restoration. Her primary focus at IHT Clinics is on the diagnostic and medical management aspects of care, including pre-surgical evaluation, regenerative therapy, and post-transplant support. This means patients who come to IHT benefit from two specialists working in complementary roles across the full restoration process, with each doctor contributing where their expertise has the greatest impact on outcome.
          </div>
        </article>

        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>How do I book a consultation with Dr Aman Dua?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden>
           You can book a consultation with Dr Aman Dua by calling or WhatsApping us at +91-97799-44207. Our team will help you schedule the appointment, guide you. with the available consultation options, and confirm the most suitable time for your visit. 
          </div>
        </article>

      </div><!-- /.faq-list -->

      <!-- FAQ Author Card -->
      <div class="faq-author faq-author--ak" style="margin-top:28px;">
        <img src="<?= base_url('assets/images/dr-aman-dua.webp') ?>" alt="Dr. Aman Dua" style="width:84px; height:84px; border-radius:50%; object-fit:cover;">
        <div class="fa-meta">
          <div class="fa-row"><strong>Dr. Aman Dua</strong></div>
          <div class="fa-row">MBBS, MD (Dermatology) | Co-Founder, IHT Clinics</div>
          <div class="fa-row" style="margin-top:4px; color:#64748b;">India's First Female Hair Transplant Surgeon · Past President, AHRS India · 20+ Years Experience</div>
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
        Consult Dr. Aman Dua for an accurate diagnosis of your hair loss and a personalised treatment plan built around your specific condition.
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
    "name": "Dr. Aman Dua",
    "jobTitle": "Co-Founder and Hair Restoration Expert, IHT Clinics",
    "description": "India's first female hair transplant surgeon and one of the country's best dermatologists specialising in hair restoration. MBBS, MD Dermatology, FISHRS, Past President and Founder Member of AHRS India, Gold Medalist. Over 20 years of experience in hair loss diagnosis, PRP therapy, GFC treatment, and comprehensive hair restoration planning.",
    "image": "https://indiahairtransplant.com/assets/images/dr-aman-dua.webp",
    "url": "https://indiahairtransplant.com/dr-aman-dua",
    "telephone": "+919779944207",
    "worksFor": {
      "@type": "MedicalOrganization",
      "name": "IHT Clinics - India Hair Transplant",
      "url": "https://indiahairtransplant.com"
    },
    "alumniOf": [
      { "@type": "EducationalOrganization", "name": "Dayanand Medical College and Hospital (DMC), Ludhiana" }
    ],
    "memberOf": [
      { "@type": "Organization", "name": "International Society of Hair Restoration Surgery (ISHRS), USA" },
      { "@type": "Organization", "name": "Association of Hair Restoration Surgeons of India (AHRS India)" }
    ],
    "award": [
      "India's first female hair transplant surgeon",
      "First Indian female doctor to present a research paper on hair transplant at an international conference",
      "Gold Medalist in Pharmacology and Microbiology, Dayanand Medical College"
    ],
    "knowsAbout": ["Hair Loss Diagnosis","Dermatology","PRP Hair Treatment","GFC Hair Treatment","Female Hair Loss","Hair Transplant Planning","Hair Restoration","Trichology"]
  }
  </script>

</div>

<?= $this->endSection() ?>
