<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<style>
/* ===== ASSESSMENT TOOL - Page-scoped styles ===== */
.hla-page *{box-sizing:border-box}

/* ---- Quiz Shell ---- */
.hla-quiz-wrap{
  background:#fff;
  border:1px solid #e7edf4;
  border-radius:20px;
  box-shadow:0 14px 40px rgba(16,24,40,.08);
  padding:36px 32px;
  max-width:720px;
  margin:0 auto;
}
@media(max-width:600px){.hla-quiz-wrap{padding:24px 18px;border-radius:14px}}

.hla-quiz-title{
  font:800 20px/1.3 Inter,system-ui,sans-serif;
  color:#121a2c;
  text-align:center;
  margin:0 0 6px;
}
.hla-quiz-sub{
  text-align:center;
  color:#5c657a;
  font-size:14px;
  margin:0 0 28px;
}

/* Progress */
.hla-progress-wrap{margin:0 0 30px}
.hla-progress-label{display:flex;justify-content:space-between;font-size:12px;color:#5c657a;margin:0 0 8px}
.hla-progress-bar{height:6px;background:#e7edf4;border-radius:99px;overflow:hidden}
.hla-progress-fill{height:100%;background:#f59e0b;border-radius:99px;transition:width .35s ease}

/* Step */
.hla-step{display:none}
.hla-step.active{display:block}
.hla-step-q{font:700 17px/1.4 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 20px;text-align:center}

/* Option buttons */
.hla-options{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:12px;
}
.hla-options.cols-1{grid-template-columns:1fr}
.hla-options.cols-3{grid-template-columns:repeat(3,1fr)}
@media(max-width:500px){
  .hla-options,.hla-options.cols-3{grid-template-columns:1fr 1fr}
  .hla-options.cols-1{grid-template-columns:1fr}
}

.hla-opt{
  display:flex;align-items:center;justify-content:center;flex-direction:column;
  gap:6px;padding:16px 12px;
  border:2px solid #e7edf4;border-radius:14px;
  background:#f9fafb;cursor:pointer;
  font:600 14px/1.35 Inter,system-ui,sans-serif;color:#121a2c;
  text-align:center;transition:all .18s ease;
  -webkit-tap-highlight-color:transparent;
}
.hla-opt:hover{border-color:#f59e0b;background:#fffbf0}
.hla-opt.selected{border-color:#f59e0b;background:#fffbf0;color:#121a2c}
.hla-opt .opt-icon{font-size:26px;line-height:1}

/* Nav */
.hla-nav{display:flex;justify-content:space-between;align-items:center;margin-top:28px;gap:12px}
.hla-btn-back{
  background:#fff;border:1px solid #e7edf4;color:#5c657a;
  height:44px;padding:0 22px;border-radius:99px;
  font:700 13px/1 Inter,system-ui,sans-serif;cursor:pointer;
  transition:all .18s;
}
.hla-btn-back:hover{border-color:#cfd6e6;color:#121a2c}
.hla-btn-next{
  background:#f59e0b;color:#fff;border:0;
  height:44px;padding:0 28px;border-radius:99px;
  font:700 14px/1 Inter,system-ui,sans-serif;cursor:pointer;
  transition:background .18s;
  margin-left:auto;
}
.hla-btn-next:hover{background:#e18f07}
.hla-btn-next:disabled{opacity:.45;cursor:not-allowed}

/* ---- Result Panel ---- */
.hla-result{display:none;text-align:center}
.hla-result.show{display:block}

.hla-result-badge{
  display:inline-flex;align-items:center;justify-content:center;
  width:96px;height:96px;border-radius:50%;
  font:900 26px/1 Inter,system-ui,sans-serif;
  margin:0 auto 16px;
}
.badge-low{background:#ecfdf5;color:#059669}
.badge-mid{background:#fef3c7;color:#b45309}
.badge-high{background:#fee2e2;color:#dc2626}

.hla-result-title{font:800 22px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 8px}
.hla-result-grade{font:700 15px/1.5 Inter,system-ui,sans-serif;color:#f59e0b;margin:0 0 12px}
.hla-result-desc{font-size:14px;line-height:1.75;color:#374151;max-width:560px;margin:0 auto 24px}

.hla-result-cards{
  display:grid;grid-template-columns:repeat(2,1fr);gap:14px;
  text-align:left;margin:0 0 24px;
}
@media(max-width:600px){.hla-result-cards{grid-template-columns:1fr}}

.hla-rcard{
  border:1px solid #e7edf4;border-radius:14px;padding:18px 16px;background:#f9fafb;
}
.hla-rcard-label{font:700 11px/1 Inter,system-ui,sans-serif;color:#f59e0b;letter-spacing:.06em;text-transform:uppercase;margin:0 0 8px}
.hla-rcard-title{font:700 15px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 6px}
.hla-rcard-text{font-size:13px;line-height:1.65;color:#5c657a;margin:0}

.hla-restart{
  background:#fff;border:1px solid #e7edf4;color:#5c657a;
  height:40px;padding:0 20px;border-radius:99px;
  font:700 13px/1 Inter,system-ui,sans-serif;cursor:pointer;
  margin-top:4px;
}
.hla-restart:hover{border-color:#cfd6e6}

/* ---- Norwood Chart Table ---- */
.norwood-stage-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:14px;
  margin-top:20px;
}
@media(max-width:900px){.norwood-stage-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:500px){.norwood-stage-grid{grid-template-columns:1fr 1fr}}

.nw-card{
  border:1px solid #e7edf4;border-radius:14px;
  padding:16px 14px;background:#fff;
}
.nw-card-stage{
  font:900 11px/1 Inter,system-ui,sans-serif;
  letter-spacing:.08em;text-transform:uppercase;
  padding:4px 10px;border-radius:99px;
  display:inline-block;margin:0 0 10px;
}
.nw-s1{background:#ecfdf5;color:#059669}
.nw-s2{background:#d1fae5;color:#065f46}
.nw-s3{background:#fef9c3;color:#854d0e}
.nw-s4{background:#fef3c7;color:#92400e}
.nw-s5{background:#fee2e2;color:#991b1b}
.nw-s6{background:#fecaca;color:#7f1d1d}
.nw-s7{background:#fee2e2;color:#7f1d1d}

.nw-card-title{font:700 14px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 5px}
.nw-card-desc{font-size:12px;line-height:1.6;color:#5c657a;margin:0 0 8px}
.nw-card-grafts{font:700 12px/1 Inter,system-ui,sans-serif;color:#f59e0b}

/* ---- Treatment Stage Cards ---- */
.treat-stage-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:22px;
}
@media(max-width:860px){.treat-stage-grid{grid-template-columns:1fr}}

.treat-stage-card{border-radius:16px;padding:24px 20px;border:1px solid #e7edf4}
.tsc-early{background:#ecfdf5;border-color:#a7f3d0}
.tsc-mid{background:#fef9c3;border-color:#fcd34d}
.tsc-adv{background:#fee2e2;border-color:#fca5a5}

.tsc-label{font:800 11px/1 Inter,system-ui,sans-serif;letter-spacing:.08em;text-transform:uppercase;margin:0 0 6px}
.tsc-early .tsc-label{color:#059669}
.tsc-mid .tsc-label{color:#b45309}
.tsc-adv .tsc-label{color:#dc2626}

.tsc-stage{font:700 15px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 12px}

.tsc-list{list-style:none;padding:0;margin:0 0 18px}
.tsc-list li{font-size:13px;line-height:1.65;color:#374151;padding:4px 0 4px 20px;position:relative}
.tsc-list li::before{content:'&#10003;';position:absolute;left:0;color:#f59e0b;font-weight:700}

.tsc-link{
  display:inline-block;font:700 13px/1 Inter,system-ui,sans-serif;
  color:#f59e0b;border-bottom:1px solid rgba(245,158,11,.3);
  transition:border-color .15s;
}
.tsc-link:hover{border-color:#f59e0b}

/* ---- Graft Range Table ---- */
/* uses existing .iht-table-wrap + .iht-cost-table from style.css */

/* ---- CTA Banner ---- */
.hla-cta-banner{
  background:linear-gradient(135deg,#121a2c 0%,#1e2d4f 100%);
  border-radius:20px;padding:48px 36px;text-align:center;
  margin-top:0;
}
.hla-cta-banner h2{font:800 26px/1.3 Inter,system-ui,sans-serif;color:#fff;margin:0 0 10px}
.hla-cta-banner p{font-size:15px;line-height:1.7;color:rgba(255,255,255,.78);max-width:560px;margin:0 auto 28px}
.hla-cta-pills{display:flex;flex-wrap:wrap;justify-content:center;gap:10px;margin-top:20px}
.hla-cta-pills span{font-size:13px;color:rgba(255,255,255,.65);background:rgba(255,255,255,.1);border-radius:99px;padding:6px 16px}
.hla-cta-btns{display:flex;justify-content:center;gap:14px;flex-wrap:wrap}
@media(max-width:600px){.hla-cta-banner{padding:32px 18px}}

/* inline CTA button */
.hla-consult-btn{
  display:inline-flex;align-items:center;height:48px;padding:0 30px;
  border-radius:99px;font:700 15px/1 Inter,system-ui,sans-serif;
  background:#f59e0b;color:#fff;border:0;cursor:pointer;
  transition:background .18s;
}
.hla-consult-btn:hover{background:#e18f07}
.hla-outline-btn{
  display:inline-flex;align-items:center;height:48px;padding:0 30px;
  border-radius:99px;font:700 15px/1 Inter,system-ui,sans-serif;
  background:transparent;color:#fff;border:2px solid rgba(255,255,255,.4);
  cursor:pointer;transition:all .18s;text-decoration:none;
}
.hla-outline-btn:hover{border-color:#fff}

/* disclaimer note */
.hla-disclaimer{
  background:#fffbf0;border:1px solid #fcd34d;border-radius:12px;
  padding:14px 18px;font-size:13px;line-height:1.65;color:#374151;
  margin-top:18px;
}
.hla-disclaimer strong{color:#92400e}
</style>

<div class="iht-about hla-page">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ====== BANNER ====== -->
  <section class="page-hero" role="banner" aria-label="Hair Loss Assessment Tool Banner">
    <div class="container wrap">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">&#8250;</span>
        <a href="<?= base_url('hair-loss') ?>">Hair Loss</a>
        <span class="sep">&#8250;</span>
        <span aria-current="page">Hair Loss Assessment</span>
      </nav>
      <h1 class="page-title">Norwood Scale &amp; Hair Loss Assessment</h1>
      <p class="page-sub">Answer 5 simple questions to estimate your Norwood stage, understand your hair loss grade, and receive stage-matched treatment guidance from India's experienced hair transplant team.</p>
    </div>
  </section>

  <!-- ====== INTERACTIVE QUIZ ====== -->
  <section class="internal-white">
    <div class="container">

      <h2 class="results-title">Free Online Hair Loss Assessment</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>
      <p class="cs-text" style="text-align:center;max-width:580px;margin:0 auto 28px">
        This tool maps your answers against the Norwood scale to estimate your hair loss grade and recommend the right next step. No registration required.
      </p>

      <!-- QUIZ WIDGET -->
      <div class="hla-quiz-wrap">

        <!-- Progress -->
        <div class="hla-progress-wrap" id="hlaProgressWrap">
          <div class="hla-progress-label">
            <span id="hlaStepLabel">Step 1 of 5</span>
            <span id="hlaStepPct">20%</span>
          </div>
          <div class="hla-progress-bar">
            <div class="hla-progress-fill" id="hlaProgressFill" style="width:20%"></div>
          </div>
        </div>

        <!-- STEP 1: Gender -->
        <div class="hla-step active" id="hlaStep1">
          <p class="hla-step-q">What is your gender?</p>
          <div class="hla-options cols-1" style="grid-template-columns:1fr 1fr">
            <button class="hla-opt" onclick="hlaSelect(this,'gender','male')">
              <span class="opt-icon">&#9794;</span> Male
            </button>
            <button class="hla-opt" onclick="hlaSelect(this,'gender','female')">
              <span class="opt-icon">&#9792;</span> Female
            </button>
          </div>
          <div class="hla-nav">
            <span></span>
            <button class="hla-btn-next" id="hlaNext1" onclick="hlaNext(1)" disabled>Next &rarr;</button>
          </div>
        </div>

        <!-- STEP 2: Age -->
        <div class="hla-step" id="hlaStep2">
          <p class="hla-step-q">What is your age group?</p>
          <div class="hla-options cols-3">
            <button class="hla-opt" onclick="hlaSelect(this,'age','18-25')">18 &ndash; 25</button>
            <button class="hla-opt" onclick="hlaSelect(this,'age','26-35')">26 &ndash; 35</button>
            <button class="hla-opt" onclick="hlaSelect(this,'age','36-45')">36 &ndash; 45</button>
            <button class="hla-opt" onclick="hlaSelect(this,'age','46-55')">46 &ndash; 55</button>
            <button class="hla-opt" onclick="hlaSelect(this,'age','56+')">56 &amp; Above</button>
          </div>
          <div class="hla-nav">
            <button class="hla-btn-back" onclick="hlaBack(2)">&larr; Back</button>
            <button class="hla-btn-next" id="hlaNext2" onclick="hlaNext(2)" disabled>Next &rarr;</button>
          </div>
        </div>

        <!-- STEP 3: Duration -->
        <div class="hla-step" id="hlaStep3">
          <p class="hla-step-q">How long have you been experiencing hair loss?</p>
          <div class="hla-options cols-1">
            <button class="hla-opt" onclick="hlaSelect(this,'duration','less-1')">Less than 1 year</button>
            <button class="hla-opt" onclick="hlaSelect(this,'duration','1-3')">1 &ndash; 3 years</button>
            <button class="hla-opt" onclick="hlaSelect(this,'duration','3-5')">3 &ndash; 5 years</button>
            <button class="hla-opt" onclick="hlaSelect(this,'duration','5+')">More than 5 years</button>
          </div>
          <div class="hla-nav">
            <button class="hla-btn-back" onclick="hlaBack(3)">&larr; Back</button>
            <button class="hla-btn-next" id="hlaNext3" onclick="hlaNext(3)" disabled>Next &rarr;</button>
          </div>
        </div>

        <!-- STEP 4: Family History -->
        <div class="hla-step" id="hlaStep4">
          <p class="hla-step-q">Does hair loss run in your family?</p>
          <div class="hla-options" style="grid-template-columns:1fr 1fr 1fr">
            <button class="hla-opt" onclick="hlaSelect(this,'family','yes')">Yes, definitely</button>
            <button class="hla-opt" onclick="hlaSelect(this,'family','maybe')">Not sure</button>
            <button class="hla-opt" onclick="hlaSelect(this,'family','no')">No / Minimal</button>
          </div>
          <div class="hla-nav">
            <button class="hla-btn-back" onclick="hlaBack(4)">&larr; Back</button>
            <button class="hla-btn-next" id="hlaNext4" onclick="hlaNext(4)" disabled>Next &rarr;</button>
          </div>
        </div>

        <!-- STEP 5: Visible Thinning -->
        <div class="hla-step" id="hlaStep5">
          <p class="hla-step-q">Where do you notice the most visible hair thinning?</p>
          <div class="hla-options cols-1">
            <button class="hla-opt" onclick="hlaSelect(this,'area','temples')">Temples only (slight recession)</button>
            <button class="hla-opt" onclick="hlaSelect(this,'area','hairline')">Hairline recession + visible scalp at front</button>
            <button class="hla-opt" onclick="hlaSelect(this,'area','crown')">Crown thinning or bald patch on top</button>
            <button class="hla-opt" onclick="hlaSelect(this,'area','both')">Both hairline and crown affected</button>
            <button class="hla-opt" onclick="hlaSelect(this,'area','extensive')">Extensive hair loss across most of scalp</button>
          </div>
          <div class="hla-nav">
            <button class="hla-btn-back" onclick="hlaBack(5)">&larr; Back</button>
            <button class="hla-btn-next" id="hlaNext5" onclick="hlaGetResult()" disabled>See My Result &rarr;</button>
          </div>
        </div>

        <!-- RESULT PANEL -->
        <div class="hla-result" id="hlaResult">
          <div class="hla-result-badge" id="hlaResultBadge">N3</div>
          <h3 class="hla-result-title" id="hlaResultTitle">Norwood Stage 3 &ndash; Moderate Hair Loss</h3>
          <p class="hla-result-grade" id="hlaResultGrade">Clinically Significant Hair Loss &bull; Action Recommended</p>
          <p class="hla-result-desc" id="hlaResultDesc">Your answers suggest early-to-moderate male pattern hair loss. Temple recession is deepening and hairline may be showing an M-shape. At this stage, both non-surgical and surgical options are relevant. A proper scalp assessment by a surgeon will confirm the grade and the ideal treatment path.</p>

          <div class="hla-result-cards" id="hlaResultCards">
            <!-- JS populated -->
          </div>

          <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin-top:4px">
            <button class="hla-consult-btn iht-popup-btn" data-popup="consult">
              Book a Scalp Assessment
            </button>
            <button class="hla-restart" onclick="hlaRestart()">Retake Assessment</button>
          </div>

          <div class="hla-disclaimer">
            <strong>Important:</strong> This tool provides a general estimate based on your responses. It is not a medical diagnosis. Your actual Norwood grade and treatment plan can only be confirmed by a qualified hair transplant surgeon after a physical scalp examination.
          </div>
        </div>
        <!-- /result -->

      </div>
      <!-- /quiz wrap -->

    </div>
  </section>

  <!-- ====== WHAT IS THE NORWOOD SCALE ====== -->
  <section class="internal-grey">
    <div class="container">

      <h2 class="results-title">What is the Norwood Scale?</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>

      <div class="cs-wrap">
        <div class="cs-content">
          <p class="cs-text">The Norwood Scale (formally the Hamilton&ndash;Norwood Scale) is the globally accepted classification system for grading male pattern baldness (androgenetic alopecia). It was originally developed by Dr. James Hamilton in the 1950s and later refined by Dr. O&rsquo;Tar Norwood in 1975. Today it remains the primary reference used by hair transplant surgeons worldwide to assess hair loss progression and plan treatment.</p>

          <p class="cs-text">The scale runs from Stage 1 (no visible loss, normal hairline) through to Stage 7 (extensive baldness covering most of the scalp with only a horseshoe fringe remaining around the sides and back). Each stage reflects a distinct pattern of temple recession, frontal thinning, and crown involvement.</p>

          <p class="cs-text">At <strong>IHT (India Hair Transplant)</strong>, every patient undergoes a clinical Norwood grading at their initial consultation. This grade directly informs the treatment approach, whether the patient is suitable for a <a href="<?= base_url('fue-hair-transplant') ?>" style="color:rgba(255,255,255,.85);border-bottom:1px solid rgba(255,255,255,.35)">FUE hair transplant</a>, a <a href="<?= base_url('fut-hair-transplant') ?>" style="color:rgba(255,255,255,.85);border-bottom:1px solid rgba(255,255,255,.35)">FUT procedure</a>, or a non-surgical alternative such as <a href="<?= base_url('prp-hair-treatment') ?>" style="color:rgba(255,255,255,.85);border-bottom:1px solid rgba(255,255,255,.35)">PRP therapy</a> or <a href="<?= base_url('gfc-hair-treatment') ?>" style="color:rgba(255,255,255,.85);border-bottom:1px solid rgba(255,255,255,.35)">GFC treatment</a>, and sets the baseline for planning graft count and hairline design.</p>

          <p class="cs-text">For women experiencing diffuse thinning or female-pattern hair loss, a separate classification system (Ludwig Scale) is typically used. If you are a female patient, we recommend speaking directly with our team for an appropriate clinical evaluation.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- ====== NORWOOD STAGE CHART ====== -->
  <section class="internal-white">
    <div class="container">

      <h2 class="results-title">Norwood Scale &ndash; All 7 Stages Explained</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>
      <p class="cs-text" style="text-align:center;max-width:620px;margin:0 auto 6px">
        Each Norwood stage carries a different clinical picture, a different treatment approach, and a different graft requirement. Use this chart to identify where you may fall.
      </p>

      <div class="norwood-stage-grid">

        <div class="nw-card">
          <span class="nw-card-stage nw-s1">Stage 1</span>
          <h3 class="nw-card-title">Normal Hairline</h3>
          <p class="nw-card-desc">No significant hair loss. Hairline is full and well-defined. No recession at temples or crown.</p>
          <span class="nw-card-grafts">Grafts: Not required</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s2">Stage 2</span>
          <h3 class="nw-card-title">Minor Temple Recession</h3>
          <p class="nw-card-desc">Slight recession at the temples. Often called a mature hairline. Hair loss is minimal and not yet clinically significant.</p>
          <span class="nw-card-grafts">Grafts: 800 &ndash; 1,200</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s3">Stage 3</span>
          <h3 class="nw-card-title">Significant Recession</h3>
          <p class="nw-card-desc">Deep temple recession creating an M, U, or V shape. First stage classified as clinically significant baldness. Stage 3 Vertex shows early crown involvement.</p>
          <span class="nw-card-grafts">Grafts: 1,200 &ndash; 2,000</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s4">Stage 4</span>
          <h3 class="nw-card-title">Hairline + Crown Thinning</h3>
          <p class="nw-card-desc">Hairline recession is deeper. A visible bald patch develops at the crown. A band of hair still separates the two zones.</p>
          <span class="nw-card-grafts">Grafts: 2,000 &ndash; 3,000</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s5">Stage 5</span>
          <h3 class="nw-card-title">Merging Zones</h3>
          <p class="nw-card-desc">The band separating hairline and crown narrows significantly. Both zones continue to enlarge. Advanced planning is required for surgical restoration.</p>
          <span class="nw-card-grafts">Grafts: 2,800 &ndash; 3,500</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s6">Stage 6</span>
          <h3 class="nw-card-title">Bridge Disappears</h3>
          <p class="nw-card-desc">The band between front and crown merges. One large bald area covers most of the top and front of the scalp. Side and back hair remains intact.</p>
          <span class="nw-card-grafts">Grafts: 3,500 &ndash; 5,000</span>
        </div>

        <div class="nw-card">
          <span class="nw-card-stage nw-s7">Stage 7</span>
          <h3 class="nw-card-title">Extensive Baldness</h3>
          <p class="nw-card-desc">Only a horseshoe fringe of hair remains along the sides and back. This is the most advanced form of male pattern baldness. Multi-session planning often required.</p>
          <span class="nw-card-grafts">Grafts: 5,000 &ndash; 7,000+</span>
        </div>

        <div class="nw-card" style="border-color:#fcd34d;background:#fffbf0">
          <span class="nw-card-stage nw-s3">Type A Variant</span>
          <h3 class="nw-card-title">Frontal Pattern</h3>
          <p class="nw-card-desc">Affects about 20% of men. Hair loss progresses from front to back without the characteristic mid-scalp island. Stages 3A through 7A follow this pattern.</p>
          <span class="nw-card-grafts">Grafts: Assessed individually</span>
        </div>

      </div>
      <!-- /norwood grid -->

      <div class="hla-disclaimer" style="margin-top:22px">
        <strong>Note:</strong> Graft ranges above are indicative estimates based on typical clinical patterns. The exact number of grafts required depends on your individual scalp condition, donor area density, and desired coverage, all of which are assessed by our surgical team at consultation.
      </div>

    </div>
  </section>

  <!-- ====== TREATMENT BY STAGE ====== -->
  <section class="internal-grey">
    <div class="container">

      <h2 class="results-title">Hair Loss Treatment Options by Norwood Stage</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>
      <p class="cs-text" style="text-align:center;max-width:620px;margin:0 auto 6px">
        The right treatment depends significantly on your Norwood grade. Our surgeons recommend stage-appropriate options to deliver the most effective and long-lasting outcome.
      </p>

      <div class="treat-stage-grid">

        <div class="treat-stage-card tsc-early">
          <p class="tsc-label">Norwood 1 &ndash; 2</p>
          <p class="tsc-stage">Early Stage &ndash; Preventive &amp; Non-Surgical</p>
          <ul class="tsc-list">
            <li>Topical Minoxidil (clinically proven to slow hair loss)</li>
            <li>Oral Finasteride under medical supervision</li>
            <li><a href="<?= base_url('prp-hair-treatment') ?>" class="tsc-link">PRP Hair Treatment</a> to strengthen follicles</li>
            <li><a href="<?= base_url('gfc-hair-treatment') ?>" class="tsc-link">GFC Therapy</a> for growth factor stimulation</li>
            <li>Lifestyle, diet, and scalp health review</li>
            <li>6&ndash;12 monthly monitoring recommended</li>
          </ul>
          <a href="<?= base_url('minoxidil-for-hair-loss') ?>" class="tsc-link">Learn about Minoxidil &rarr;</a>
        </div>

        <div class="treat-stage-card tsc-mid">
          <p class="tsc-label">Norwood 3 &ndash; 4</p>
          <p class="tsc-stage">Moderate Stage &ndash; Consider Hair Transplant</p>
          <ul class="tsc-list">
            <li><a href="<?= base_url('fue-hair-transplant') ?>" class="tsc-link">FUE Hair Transplant</a> for natural results</li>
            <li><a href="<?= base_url('unshaven-hair-transplant') ?>" class="tsc-link">Unshaven FUE</a> &ndash; no visible shave required</li>
            <li>Permanent, natural-looking hairline restoration</li>
            <li>PRP recommended as post-op maintenance</li>
            <li>Single session typically sufficient</li>
            <li>Combined medication to protect remaining hair</li>
          </ul>
          <a href="<?= base_url('hair-transplant') ?>" class="tsc-link">Learn about Hair Transplant &rarr;</a>
        </div>

        <div class="treat-stage-card tsc-adv">
          <p class="tsc-label">Norwood 5 &ndash; 7</p>
          <p class="tsc-stage">Advanced Stage &ndash; Planned Surgical Restoration</p>
          <ul class="tsc-list">
            <li>Custom multi-session FUE or <a href="<?= base_url('fut-hair-transplant') ?>" class="tsc-link">FUT planning</a></li>
            <li>Donor assessment to maximise coverage</li>
            <li>Hairline, mid-scalp and crown restoration plan</li>
            <li>Lifetime aftercare and follow-up support</li>
            <li>Realistic density and coverage goals set upfront</li>
            <li>Staged approach ensures optimal graft survival</li>
          </ul>
          <a href="<?= base_url('hair-transplant-safety-and-recovery') ?>" class="tsc-link">Safety &amp; Recovery Guide &rarr;</a>
        </div>

      </div>

    </div>
  </section>

  <!-- ====== GRAFT RANGE TABLE ====== -->
  <section class="internal-white">
    <div class="container">

      <h2 class="results-title">How Many Grafts Do I Need? &ndash; Stage-Wise Guide</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>
      <p class="cs-text" style="text-align:center;max-width:620px;margin:0 auto 20px">
        Graft count is the primary driver of hair transplant cost in India. Use this table as a starting reference, then use our <a href="<?= base_url('hair-transplant-cost-calculator') ?>">Cost Calculator</a> to estimate your total investment.
      </p>

      <div class="iht-table-wrap" role="region" aria-label="Norwood stage graft requirements table" tabindex="0">
        <table class="iht-cost-table">
          <thead>
            <tr>
              <th>Norwood Stage</th>
              <th>Typical Graft Range</th>
              <th>Sessions Required</th>
              <th>Estimated Cost Range (Rs.)</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Stage 1 &ndash; 2</td><td>800 &ndash; 1,200 grafts</td><td>1 Session</td><td>Rs. 40,000 &ndash; Rs. 1,00,000</td></tr>
            <tr><td>Stage 3</td><td>1,200 &ndash; 2,000 grafts</td><td>1 Session</td><td>Rs. 55,000 &ndash; Rs. 1,60,000</td></tr>
            <tr><td>Stage 4</td><td>2,000 &ndash; 3,000 grafts</td><td>1 Session</td><td>Rs. 80,000 &ndash; Rs. 2,20,000</td></tr>
            <tr><td>Stage 5</td><td>2,800 &ndash; 3,500 grafts</td><td>1&ndash;2 Sessions</td><td>Rs. 1,10,000 &ndash; Rs. 2,80,000</td></tr>
            <tr><td>Stage 6</td><td>3,500 &ndash; 5,000 grafts</td><td>2 Sessions</td><td>Rs. 1,30,000 &ndash; Rs. 4,00,000</td></tr>
            <tr><td>Stage 7</td><td>5,000 &ndash; 7,000+ grafts</td><td>2+ Sessions</td><td>Rs. 1,70,000 &ndash; Rs. 4,50,000+</td></tr>
          </tbody>
        </table>
      </div>

      <div class="hla-disclaimer">
        <strong>Disclaimer:</strong> Graft estimates and costs are indicative ranges based on average clinical presentations. Actual requirements can only be confirmed after a personal scalp and donor assessment by a qualified IHT surgeon. Cost varies by technique (FUE, FUT, Unshaven FUE) and city of treatment (Delhi, Ludhiana, Bangalore).
        <br><br>
        For a personalised estimate, use our <a href="<?= base_url('hair-transplant-cost-calculator') ?>" style="color:#b45309;font-weight:700">Hair Transplant Cost Calculator &rarr;</a>
      </div>

    </div>
  </section>

  <!-- ====== FAQ ====== -->
  <section class="internal-grey">
    <div class="container">

      <h2 class="results-title">Frequently Asked Questions</h2>
      <div class="results-divider" aria-hidden="true">
        <span class="line"></span><span class="cross">&#10010;</span><span class="line"></span>
      </div>

      <div class="iht-acc">
        <div class="iht-acc-shell">
          <div class="iht-acc-cols">

            <div class="iht-acc-col">

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">How accurate is this online hair loss assessment?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  This tool provides a general estimate based on visible symptoms and self-reported information. It uses the same logic applied in initial patient screenings. However, it cannot replace a clinical examination. Factors like donor density, scalp laxity, miniaturised hair, and hairline position can only be evaluated in person by a trained surgeon. Use this as a starting point, not a final diagnosis.
                </div>
              </div>

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">At what Norwood stage should I consider a hair transplant?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  Most surgeons consider Norwood Stage 3 and above as the threshold where surgical intervention becomes a meaningful option. At Stage 3, hair loss is clinically significant and non-surgical treatments alone may not restore lost density. From Stage 3 onwards, FUE hair transplant planning becomes appropriate. Stages 1 and 2 are generally managed with medications and PRP therapy.
                </div>
              </div>

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">Does a family history of baldness mean I will definitely go bald?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  Family history is a strong predictor of androgenetic alopecia but not an absolute guarantee. Hair loss is polygenic, meaning it is influenced by multiple genes inherited from both parents, not just one side of the family. Early consultation allows for preventive steps that can meaningfully slow progression, even in those with strong genetic risk.
                </div>
              </div>

            </div>

            <div class="iht-acc-col">

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">I am at Norwood Stage 6 or 7. Is a hair transplant still possible?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  Yes, but with careful planning. Advanced Norwood grades require a larger number of grafts, and the donor supply from the scalp back and sides becomes a critical factor. In many cases, two surgical sessions are planned to achieve meaningful coverage without over-harvesting the donor area. A detailed consultation including scalp analysis is essential to set realistic expectations.
                </div>
              </div>

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">What happens after the online assessment?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  The online result gives you a general Norwood grade estimate and treatment direction. The recommended next step is a personal consultation with an IHT surgeon, available at our clinics in <a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a>, <a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a>, and <a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a>. During this consultation, your scalp is examined, donor area assessed, hairline planned, and a transparent treatment estimate is provided.
                </div>
              </div>

              <div class="iht-acc-item">
                <button class="iht-acc-q" aria-expanded="false">
                  <span class="iht-acc-title">Can women use the Norwood scale to assess their hair loss?</span>
                  <span class="iht-acc-ico" aria-hidden="true"></span>
                </button>
                <div class="iht-acc-a" hidden>
                  The Norwood scale is designed for male pattern baldness. Women typically experience diffuse thinning across the scalp rather than zone-specific recession, which is better assessed using the Ludwig Classification. If you are a woman experiencing visible hair thinning, we recommend consulting our team directly for an appropriate evaluation. IHT also offers <a href="<?= base_url('female-hair-transplant') ?>">female hair transplant</a> options for suitable candidates.
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ====== CTA BANNER ====== -->
  <section class="internal-white">
    <div class="container">
      <div class="hla-cta-banner">
        <h2>Get Your Personal Scalp Assessment</h2>
        <p>The online tool gives you a starting point. Our surgeons give you the complete picture &ndash; scalp analysis, donor assessment, graft planning, and transparent cost &ndash; at no obligation.</p>
        <div class="hla-cta-btns">
          <button class="hla-consult-btn iht-popup-btn" data-popup="consult">
            Book a Consultation
          </button>
          <a href="<?= base_url('hair-transplant-cost-calculator') ?>" class="hla-outline-btn">
            Cost Calculator &rarr;
          </a>
        </div>
        <div class="hla-cta-pills">
          <span>&#10003; No obligation</span>
          <span>&#10003; Surgeon-led evaluation</span>
          <span>&#10003; Delhi &bull; Ludhiana &bull; Bangalore</span>
        </div>
      </div>
    </div>
  </section>

</div><!-- /iht-about -->

<!-- ====== QUIZ JAVASCRIPT ====== -->
<script>
(function(){
  var answers = {};

  function hlaSelect(el, key, val){
    // deselect siblings
    var parent = el.parentNode;
    parent.querySelectorAll('.hla-opt').forEach(function(b){ b.classList.remove('selected'); });
    el.classList.add('selected');
    answers[key] = val;
    // enable next button for this step
    var stepMap = {gender:1, age:2, duration:3, family:4, area:5};
    var step = stepMap[key];
    var btn = document.getElementById('hlaNext' + step);
    if(btn) btn.disabled = false;
  }
  window.hlaSelect = hlaSelect;

  function hlaNext(step){
    document.getElementById('hlaStep' + step).classList.remove('active');
    document.getElementById('hlaStep' + (step+1)).classList.add('active');
    var pct = Math.round(((step+1)/5)*100);
    document.getElementById('hlaProgressFill').style.width = pct + '%';
    document.getElementById('hlaStepLabel').textContent = 'Step ' + (step+1) + ' of 5';
    document.getElementById('hlaStepPct').textContent = pct + '%';
  }
  window.hlaNext = hlaNext;

  function hlaBack(step){
    document.getElementById('hlaStep' + step).classList.remove('active');
    document.getElementById('hlaStep' + (step-1)).classList.add('active');
    var pct = Math.round(((step-1)/5)*100);
    document.getElementById('hlaProgressFill').style.width = pct + '%';
    document.getElementById('hlaStepLabel').textContent = 'Step ' + (step-1) + ' of 5';
    document.getElementById('hlaStepPct').textContent = pct + '%';
  }
  window.hlaBack = hlaBack;

  function hlaGetResult(){
    // Calculate Norwood grade from answers
    var score = 0;
    var a = answers;

    // Duration weight
    if(a.duration === 'less-1') score += 1;
    else if(a.duration === '1-3')  score += 2;
    else if(a.duration === '3-5')  score += 3;
    else if(a.duration === '5+')   score += 4;

    // Family history
    if(a.family === 'yes')   score += 2;
    else if(a.family === 'maybe') score += 1;

    // Area
    if(a.area === 'temples')    score += 1;
    else if(a.area === 'hairline') score += 2;
    else if(a.area === 'crown')    score += 2;
    else if(a.area === 'both')     score += 4;
    else if(a.area === 'extensive')score += 6;

    // Age - older means more advanced at same score
    if(a.age === '18-25') score -= 1;
    else if(a.age === '56+') score += 1;

    // Female note
    if(a.gender === 'female'){
      showFemaleResult();
      return;
    }

    // Map score to grade
    var grade;
    if(score <= 2) grade = 2;
    else if(score <= 4) grade = 3;
    else if(score <= 6) grade = 4;
    else if(score <= 8) grade = 5;
    else if(score <= 10) grade = 6;
    else grade = 7;

    showResult(grade);
  }
  window.hlaGetResult = hlaGetResult;

  var gradeData = {
    2: {
      badge:'N2', badgeClass:'badge-low',
      title:'Norwood Stage 2 &mdash; Minor Recession',
      grade:'Early Stage &bull; Preventive Action Beneficial',
      desc:'Your answers suggest early-stage hair loss characterised by minor temple recession. At this stage, hair loss is not clinically severe. Non-surgical interventions are highly effective in slowing or halting further progression.',
      cards:[
        {label:'Primary Treatment', title:'Non-Surgical Options', text:'Topical Minoxidil, PRP therapy, and Finasteride can effectively slow progression at this stage.'},
        {label:'Surgical Need', title:'Not Immediately Required', text:'Hair transplant is typically considered from Stage 3 onwards. Early action with medications is recommended now.'}
      ]
    },
    3: {
      badge:'N3', badgeClass:'badge-mid',
      title:'Norwood Stage 3 &mdash; Moderate Hair Loss',
      grade:'Clinically Significant &bull; Treatment Recommended',
      desc:'Your answers suggest moderate hair loss with visible temple recession. Stage 3 is the first clinically significant grade. Both non-surgical and surgical options are relevant at this stage.',
      cards:[
        {label:'Surgical Option', title:'FUE Hair Transplant', text:'FUE is commonly recommended from Stage 3 onwards for a permanent, natural hairline restoration.'},
        {label:'Non-Surgical Option', title:'PRP + Medications', text:'PRP therapy and Finasteride can be used alongside or before surgery to strengthen existing hair.'}
      ]
    },
    4: {
      badge:'N4', badgeClass:'badge-mid',
      title:'Norwood Stage 4 &mdash; Hairline + Crown Affected',
      grade:'Moderate to Advanced &bull; Surgical Planning Advised',
      desc:'Your answers suggest both hairline and crown areas are involved. This stage typically requires 2,000 to 3,000 grafts for meaningful restoration. A detailed scalp assessment is recommended.',
      cards:[
        {label:'Recommended Approach', title:'FUE or Unshaven FUE', text:'Single-session FUE covering hairline and crown. Unshaven FUE available for those who prefer no visible shave.'},
        {label:'Grafts Estimate', title:'2,000 &ndash; 3,000 Grafts', text:'Actual count confirmed after donor area evaluation. Cost estimate: Rs. 80,000 &ndash; Rs. 2,20,000.'}
      ]
    },
    5: {
      badge:'N5', badgeClass:'badge-high',
      title:'Norwood Stage 5 &mdash; Merging Bald Zones',
      grade:'Advanced &bull; Planned Surgical Restoration Needed',
      desc:'Your answers suggest significant hair loss across both hairline and crown with the zones beginning to merge. Surgical planning at this stage requires careful donor assessment and realistic density goals.',
      cards:[
        {label:'Surgical Plan', title:'FUE or FUT &mdash; 1&ndash;2 Sessions', text:'Staged surgical plan is common at Stage 5 to maximise coverage while protecting donor supply.'},
        {label:'Grafts Estimate', title:'2,800 &ndash; 3,500 Grafts', text:'Cost estimate: Rs. 1,10,000 &ndash; Rs. 2,80,000 depending on technique and city.'}
      ]
    },
    6: {
      badge:'N6', badgeClass:'badge-high',
      title:'Norwood Stage 6 &mdash; Large Bald Area',
      grade:'Advanced &bull; Multi-Session Planning Required',
      desc:'Your answers suggest extensive hair loss with front and crown zones fully merged. This stage requires comprehensive surgical planning. A two-session FUE or FUT approach is typically recommended.',
      cards:[
        {label:'Surgical Plan', title:'Multi-Session FUE or FUT', text:'Two surgical sessions are often needed to achieve optimal coverage at Stage 6. Donor area capacity is carefully evaluated first.'},
        {label:'Grafts Estimate', title:'3,500 &ndash; 5,000 Grafts', text:'Cost estimate: Rs. 1,30,000 &ndash; Rs. 4,00,000 across sessions.'}
      ]
    },
    7: {
      badge:'N7', badgeClass:'badge-high',
      title:'Norwood Stage 7 &mdash; Extensive Baldness',
      grade:'Most Advanced &bull; Comprehensive Surgical Plan Needed',
      desc:'Your answers suggest the most advanced stage of male pattern baldness, with only a horseshoe fringe of hair remaining. Surgical restoration is possible but requires careful planning around donor supply, realistic density expectations, and staged sessions.',
      cards:[
        {label:'Surgical Plan', title:'Staged FUE or FUT Sessions', text:'Multiple sessions may be required for full coverage. Our surgeons design a plan around your donor density and coverage priorities.'},
        {label:'Grafts Estimate', title:'5,000 &ndash; 7,000+ Grafts', text:'Cost estimate: Rs. 1,70,000 &ndash; Rs. 4,50,000+ across planned sessions.'}
      ]
    }
  };

  function showResult(grade){
    // Hide steps
    for(var i=1;i<=5;i++) document.getElementById('hlaStep'+i).classList.remove('active');
    document.getElementById('hlaProgressWrap').style.display='none';

    var d = gradeData[grade] || gradeData[4];
    document.getElementById('hlaResultBadge').textContent = d.badge;
    document.getElementById('hlaResultBadge').className = 'hla-result-badge ' + d.badgeClass;
    document.getElementById('hlaResultTitle').innerHTML = d.title;
    document.getElementById('hlaResultGrade').innerHTML = d.grade;
    document.getElementById('hlaResultDesc').innerHTML = d.desc;

    var cardsHtml = '';
    d.cards.forEach(function(c){
      cardsHtml += '<div class="hla-rcard"><p class="hla-rcard-label">'+c.label+'</p><p class="hla-rcard-title">'+c.title+'</p><p class="hla-rcard-text">'+c.text+'</p></div>';
    });
    document.getElementById('hlaResultCards').innerHTML = cardsHtml;

    document.getElementById('hlaResult').classList.add('show');
  }

  function showFemaleResult(){
    for(var i=1;i<=5;i++) document.getElementById('hlaStep'+i).classList.remove('active');
    document.getElementById('hlaProgressWrap').style.display='none';
    document.getElementById('hlaResultBadge').textContent = 'F';
    document.getElementById('hlaResultBadge').className = 'hla-result-badge badge-mid';
    document.getElementById('hlaResultTitle').innerHTML = 'Female Hair Loss &mdash; Personalised Assessment Recommended';
    document.getElementById('hlaResultGrade').innerHTML = 'Ludwig Scale Applicable &bull; Clinical Evaluation Advised';
    document.getElementById('hlaResultDesc').innerHTML = 'Female pattern hair loss is assessed using the Ludwig Scale rather than the Norwood scale. It typically presents as diffuse thinning across the crown rather than the zone-specific recession seen in male pattern baldness. Our team offers tailored female hair loss consultations to identify causes and plan appropriate treatment.';
    document.getElementById('hlaResultCards').innerHTML = '<div class="hla-rcard"><p class="hla-rcard-label">Assessment Tool</p><p class="hla-rcard-title">Ludwig Scale Evaluation</p><p class="hla-rcard-text">Female hair loss is classified separately. In-person scalp assessment required for accurate grading.</p></div><div class="hla-rcard"><p class="hla-rcard-label">Treatment Options</p><p class="hla-rcard-title">PRP, GFC &amp; Female Transplant</p><p class="hla-rcard-text">Non-surgical options like PRP and GFC are common first steps. Female hair transplant is available for suitable candidates.</p></div>';
    document.getElementById('hlaResult').classList.add('show');
  }

  function hlaRestart(){
    answers = {};
    document.getElementById('hlaResult').classList.remove('show');
    document.getElementById('hlaProgressWrap').style.display='block';
    for(var i=1;i<=5;i++){
      var step = document.getElementById('hlaStep'+i);
      step.classList.remove('active');
      step.querySelectorAll('.hla-opt').forEach(function(b){ b.classList.remove('selected'); });
      var btn = document.getElementById('hlaNext'+i);
      if(btn) btn.disabled = true;
    }
    document.getElementById('hlaStep1').classList.add('active');
    document.getElementById('hlaProgressFill').style.width = '20%';
    document.getElementById('hlaStepLabel').textContent = 'Step 1 of 5';
    document.getElementById('hlaStepPct').textContent = '20%';
  }
  window.hlaRestart = hlaRestart;

  // Accordion for FAQ
  document.querySelectorAll('.iht-acc-q').forEach(function(btn){
    btn.addEventListener('click', function(){
      var expanded = this.getAttribute('aria-expanded') === 'true';
      var answer = this.nextElementSibling;
      this.setAttribute('aria-expanded', !expanded);
      if(expanded){ answer.setAttribute('hidden',''); }
      else { answer.removeAttribute('hidden'); }
    });
  });

})();
</script>

<?= $this->endSection() ?>
