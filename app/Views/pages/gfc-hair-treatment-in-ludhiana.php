<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="iht-about">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ============ BANNER ============ -->
  <section class="page-hero" role="banner" aria-label="GFC Therapy in Ludhiana Banner">
    <div class="container wrap">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">›</span>
        <a href="<?= base_url('gfc-hair-treatment') ?>">GFC Therapy</a>
        <span class="sep">›</span>
        <span aria-current="page">GFC Therapy in Ludhiana</span>
      </nav>

      <h1 class="page-title">GFC Therapy in Ludhiana</h1>
      <p class="page-sub">Doctor-supervised GFC therapy for early hair thinning and increased hair fall, available at IHT's two Ludhiana clinics (Sarabha Nagar and South City).</p>
      <?= $this->include('partials/hero-consult-cta') ?>
    </div>
  </section>

  <!-- ============ QUICK ANSWER ============ -->
  <section class="internal-grey">
    <div class="container">
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            <strong>Quick answer:</strong> GFC therapy is available at both of IHT's Ludhiana clinics, Sarabha Nagar (Kips Market) and South City. A scalp assessment decides whether GFC therapy is appropriate before any session is booked. It is a non-surgical, supportive treatment for early hair thinning with active hair follicles, not a substitute for a hair transplant in areas of complete baldness.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="internal-white">
    <div class="container">
      <h2 class="results-title">GFC Therapy at IHT's Ludhiana Clinics</h2>
      <div class="results-divider" aria-hidden="true"><span class="line"></span><span class="cross">✚</span><span class="line"></span></div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            Patients in Ludhiana can access GFC therapy at either of IHT's two clinics: Sarabha Nagar, opposite Kips Market, or South City, on Canal Road. As with every IHT location, GFC is advised only after a scalp and hair assessment confirms it is a suitable option, and it is performed under proper clinical supervision rather than by technicians.
          </p>
          <p class="cs-text">
            For the full procedure, candidacy details, benefits, and safety information, see the main <a href="<?= base_url('gfc-hair-treatment') ?>">GFC therapy</a> page.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="internal-grey">
    <div class="container">
      <h2 class="results-title">GFC Therapy Cost in Ludhiana</h2>
      <div class="results-divider" aria-hidden="true"><span class="line"></span><span class="cross">✚</span><span class="line"></span></div>
      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">
            A single GFC therapy session (with LLT) at IHT typically costs INR 11,999. A package of 3 sessions typically costs INR 30,000. The exact cost depends on the treatment plan advised after a clinical evaluation of your scalp and hair loss stage.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="iht-cta-strip">
    <div class="container iht-cta-wrap">
      <p class="iht-cta-text">
        Book a consultation at IHT's Ludhiana clinics to find out whether GFC therapy is right for you.
      </p>
      <a href="tel:+918699003797" class="iht-cta-btn">Call +91 86990 03797</a>
    </div>
  </section>

  <section class="results-section faq-sec faq--light">
    <div class="container">
      <h2 class="results-title">Frequently Asked Questions – GFC Therapy in Ludhiana</h2>
      <div class="results-divider"><span class="line"></span><span class="cross">+</span><span class="line"></span></div>

      <div class="faq-list" id="faqList">
        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Where are IHT's GFC therapy clinics in Ludhiana located?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden="">
            IHT has two clinics in Ludhiana: 51-E, Sarabha Nagar, opposite Kips Market, and 60, Canal Road, South End, Aggar Nagar. Both are open Monday to Sunday, 10:30 AM to 6:30 PM.
          </div>
        </article>
        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Do I need an appointment for a GFC consultation in Ludhiana?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden="">
            Yes. A scalp and hair assessment is required before GFC is advised, so booking a consultation in advance at either clinic ensures the doctor has time for a proper evaluation.
          </div>
        </article>
        <article class="faq-item">
          <button class="faq-q" aria-expanded="false">
            <span>Is GFC therapy at IHT Ludhiana the same as at IHT's other clinics?</span>
            <i class="faq-ico" aria-hidden="true"></i>
          </button>
          <div class="faq-a" hidden="">
            Yes, the same clinical protocol, hygiene standards, and doctor-led evaluation process are followed at every IHT location, including Delhi, Ludhiana, and Bangalore.
          </div>
        </article>
      </div>
    </div>
  </section>

  <section>
    <aside class="faq-author faq-author--ak">
      <img loading="lazy" src="<?= base_url('assets/images/dr-kapil-dua-icon.png') ?>" alt="IHT Medical Team">
      <div class="fa-meta">
        <p class="fa-row"><strong>Authored by:</strong> IHT Medical Team</p>
        <p class="fa-row"><strong>Reviewed by:</strong> <a href="<?= base_url('dr-kapil-dua') ?>">Dr. Kapil Dua</a>, MBBS, MS - Chairman &amp; Chief Hair Transplant Surgeon</p>
        <p class="fa-row"><strong>Updated on:</strong> November 26, 2026</p>
      </div>
    </aside>
  </section>

</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "MedicalBusiness",
      "name": "IHT Clinic Ludhiana (Sarabha Nagar) | GFC Therapy",
      "url": "https://indiahairtransplant.com/gfc-hair-treatment-in-ludhiana",
      "telephone": "+918699003797",
      "priceRange": "₹₹",
      "currenciesAccepted": "INR",
      "medicalSpecialty": "Dermatology",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "51-E, Sarabha Nagar, Opp Kipps Market",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.9010,
        "longitude": 75.8573
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
        "opens": "10:30",
        "closes": "18:30"
      },
      "areaServed": { "@type": "City", "name": "Ludhiana" }
    },
    {
      "@type": "MedicalBusiness",
      "name": "IHT Clinic Ludhiana (South City) | GFC Therapy",
      "url": "https://indiahairtransplant.com/gfc-hair-treatment-in-ludhiana",
      "telephone": "+918699003797",
      "medicalSpecialty": "Dermatology",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "60, Canal Rd, South End, Aggar Nagar",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141001",
        "addressCountry": "IN"
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
        "opens": "10:30",
        "closes": "18:30"
      },
      "areaServed": { "@type": "City", "name": "Ludhiana" }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Where are IHT's GFC therapy clinics in Ludhiana located?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "IHT has two clinics in Ludhiana: 51-E, Sarabha Nagar, opposite Kips Market, and 60, Canal Road, South End, Aggar Nagar. Both are open Monday to Sunday, 10:30 AM to 6:30 PM."
          }
        },
        {
          "@type": "Question",
          "name": "Do I need an appointment for a GFC consultation in Ludhiana?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. A scalp and hair assessment is required before GFC is advised, so booking a consultation in advance at either clinic ensures the doctor has time for a proper evaluation."
          }
        },
        {
          "@type": "Question",
          "name": "Is GFC therapy at IHT Ludhiana the same as at IHT's other clinics?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, the same clinical protocol, hygiene standards, and doctor-led evaluation process are followed at every IHT location, including Delhi, Ludhiana, and Bangalore."
          }
        }
      ]
    }
  ]
}
</script>

<?= $this->endSection() ?>
