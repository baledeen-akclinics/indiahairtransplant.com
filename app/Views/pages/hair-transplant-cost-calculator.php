<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<style>
/* ===== COST CALCULATOR V2 - scoped styles ===== */
.hcc2 *{box-sizing:border-box}

/* Hero */
.hcc2-hero{
  background:linear-gradient(135deg,#0f172a 0%,#1e3058 100%);
  padding:52px 0 44px;text-align:center;
}
.hcc2-eyebrow{
  display:inline-block;font:700 11px/1 Inter,system-ui,sans-serif;
  letter-spacing:.08em;text-transform:uppercase;color:#f59e0b;margin:0 0 12px;
}
.hcc2-h1{font:800 clamp(22px,3vw,36px)/1.25 Inter,system-ui,sans-serif;color:#fff;margin:0 0 10px}
.hcc2-sub{font-size:15px;color:rgba(255,255,255,.72);max-width:520px;margin:0 auto;line-height:1.65}
.hcc2-breadcrumb{
  display:flex;align-items:center;justify-content:center;flex-wrap:wrap;gap:6px;
  font-size:12px;color:rgba(255,255,255,.5);margin:0 0 20px;
}
.hcc2-breadcrumb a{color:rgba(255,255,255,.6);transition:color .15s}
.hcc2-breadcrumb a:hover{color:#f59e0b}
.hcc2-breadcrumb .sep{opacity:.4}

/* Calc Card */
.hcc2-section{padding:40px 0}
.hcc2-calc-card{
  background:#fff;border:1px solid #e7edf4;border-radius:20px;
  padding:36px 32px;box-shadow:0 14px 40px rgba(16,24,40,.07);
  max-width:860px;margin:0 auto;
}
@media(max-width:600px){.hcc2-calc-card{padding:22px 16px;border-radius:14px}}
.hcc2-card-h{font:700 18px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 4px}
.hcc2-card-sub{font-size:13px;color:#5c657a;margin:0 0 26px}

/* Stage Label */
.hcc2-stage-label{
  font:700 11px/1 Inter,system-ui,sans-serif;color:#5c657a;
  letter-spacing:.06em;text-transform:uppercase;margin:0 0 10px;
}

/* Norwood Stage Selector */
.hcc2-nw-row{
  display:grid;grid-template-columns:repeat(7,1fr);gap:8px;margin-bottom:26px;
}
@media(max-width:560px){.hcc2-nw-row{gap:5px}}

.hcc2-nw-btn{
  display:flex;flex-direction:column;align-items:center;gap:5px;
  padding:10px 3px 8px;border-radius:12px;cursor:pointer;
  border:2px solid #e7edf4;background:#f9fafb;
  transition:all .18s ease;position:relative;
  -webkit-tap-highlight-color:transparent;
}
.hcc2-nw-btn:hover{border-color:#f59e0b;background:#fffbf0}
.hcc2-nw-btn.active{border-color:#f59e0b;background:#fffbf0;box-shadow:0 0 0 3px rgba(245,158,11,.15)}
.hcc2-nw-btn .sel-badge{
  display:none;position:absolute;top:-8px;left:50%;transform:translateX(-50%);
  background:#f59e0b;color:#fff;font:700 9px/1 Inter,system-ui,sans-serif;
  padding:2px 7px;border-radius:99px;white-space:nowrap;
}
.hcc2-nw-btn.active .sel-badge{display:block}

.hcc2-nw-icon{width:100%;max-width:44px;height:30px;display:block}
@media(max-width:560px){.hcc2-nw-icon{max-width:32px;height:22px}}

.hcc2-nw-num{font:800 11px/1 Inter,system-ui,sans-serif;color:#5c657a}
.hcc2-nw-btn.active .hcc2-nw-num{color:#92400e}
.hcc2-nw-text{font-size:10px;color:#9ca3af;text-align:center;line-height:1.2}
@media(max-width:480px){.hcc2-nw-text{display:none}}
.hcc2-nw-btn.active .hcc2-nw-text{color:#b45309}

/* Stage description bar */
.hcc2-stage-bar{
  background:#fffbf0;border:1px solid #fcd34d;border-radius:10px;
  padding:10px 16px;font-size:13px;line-height:1.6;color:#6b5000;
  margin-bottom:22px;min-height:42px;transition:all .18s;
}
.hcc2-stage-bar strong{color:#92400e}
.hcc2-stage-bar.hidden{opacity:0;pointer-events:none}

/* Form Grid */
.hcc2-form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px}
@media(max-width:520px){.hcc2-form-row{grid-template-columns:1fr}}
.hcc2-field-label{
  display:block;font:700 11px/1 Inter,system-ui,sans-serif;
  color:#5c657a;letter-spacing:.06em;text-transform:uppercase;margin-bottom:7px;
}
.hcc2-select{
  width:100%;height:46px;border:1.5px solid #e7edf4;border-radius:12px;
  padding:0 40px 0 14px;font:600 14px/1 Inter,system-ui,sans-serif;color:#121a2c;
  background:#f9fafb;cursor:pointer;
  appearance:none;-webkit-appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath fill='%235c657a' d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right 12px center;
  transition:border-color .18s;
}
.hcc2-select:focus{outline:none;border-color:#f59e0b;box-shadow:0 0 0 3px rgba(245,158,11,.12)}

/* Tech Icons */
.hcc2-tech-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:20px}
.hcc2-tech-btn{
  display:flex;flex-direction:column;align-items:center;gap:8px;
  padding:14px 8px 12px;border-radius:12px;cursor:pointer;
  border:2px solid #e7edf4;background:#f9fafb;
  transition:all .18s;-webkit-tap-highlight-color:transparent;
}
.hcc2-tech-btn:hover{border-color:#f59e0b;background:#fffbf0}
.hcc2-tech-btn.active{border-color:#f59e0b;background:#fffbf0;box-shadow:0 0 0 3px rgba(245,158,11,.15)}
.hcc2-tech-ico{
  width:44px;height:44px;border-radius:12px;background:#f3f4f6;
  display:flex;align-items:center;justify-content:center;font-size:22px;
  transition:background .18s;
}
.hcc2-tech-btn.active .hcc2-tech-ico{background:#fef3c7}
.hcc2-tech-name{font:700 13px/1.2 Inter,system-ui,sans-serif;color:#121a2c;text-align:center}
.hcc2-tech-desc{font-size:11px;color:#9ca3af;text-align:center;line-height:1.3}
.hcc2-tech-btn.active .hcc2-tech-desc{color:#b45309}
@media(max-width:480px){.hcc2-tech-desc{display:none}}

/* City buttons */
.hcc2-city-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:24px}
.hcc2-city-btn{
  display:flex;align-items:center;justify-content:center;gap:8px;
  padding:12px 10px;border-radius:12px;cursor:pointer;
  border:2px solid #e7edf4;background:#f9fafb;
  font:700 13px/1 Inter,system-ui,sans-serif;color:#121a2c;
  transition:all .18s;-webkit-tap-highlight-color:transparent;
}
.hcc2-city-btn:hover{border-color:#f59e0b;background:#fffbf0}
.hcc2-city-btn.active{border-color:#f59e0b;background:#fffbf0;box-shadow:0 0 0 3px rgba(245,158,11,.15);color:#92400e}
.hcc2-city-ico{font-size:18px}

/* CTA button */
.hcc2-calc-btn{
  width:100%;height:52px;background:#f59e0b;color:#fff;border:0;
  border-radius:12px;font:700 16px/1 Inter,system-ui,sans-serif;
  cursor:pointer;transition:background .18s,transform .12s;
  display:flex;align-items:center;justify-content:center;gap:10px;
}
.hcc2-calc-btn:hover{background:#e18f07;transform:translateY(-1px)}
.hcc2-calc-btn:active{transform:translateY(0)}
.hcc2-calc-btn svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}

/* Result Panel */
.hcc2-result{
  display:none;border-top:1px solid #e7edf4;margin-top:28px;padding-top:28px;
}
.hcc2-result.show{display:block;animation:hcc2Slide .3s ease}
@keyframes hcc2Slide{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}

.hcc2-result-head{
  display:flex;align-items:center;gap:12px;margin-bottom:18px;flex-wrap:wrap;
}
.hcc2-result-pill{
  font:700 11px/1 Inter,system-ui,sans-serif;letter-spacing:.05em;
  padding:5px 14px;border-radius:99px;background:#fef3c7;color:#92400e;border:1px solid #fcd34d;
}
.hcc2-result-title{font:700 16px/1.3 Inter,system-ui,sans-serif;color:#121a2c}

.hcc2-stat-row{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:18px}
@media(max-width:480px){.hcc2-stat-row{grid-template-columns:1fr 1fr}}
.hcc2-stat{
  border:1px solid #e7edf4;border-radius:12px;padding:16px 12px;text-align:center;
  background:#f9fafb;
}
.hcc2-stat-label{font:700 10px/1 Inter,system-ui,sans-serif;color:#9ca3af;letter-spacing:.05em;text-transform:uppercase;margin:0 0 6px}
.hcc2-stat-val{font:900 18px/1.2 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 3px}
.hcc2-stat-sub{font-size:11px;color:#9ca3af}

.hcc2-result-note{
  background:#fffbf0;border:1px solid #fcd34d;border-radius:10px;
  padding:12px 16px;font-size:13px;line-height:1.65;color:#6b5000;margin-bottom:16px;
}
.hcc2-result-note strong{color:#92400e}

.hcc2-result-cta{display:flex;gap:10px;flex-wrap:wrap}
.hcc2-btn-p{
  flex:1;min-width:140px;height:42px;background:#f59e0b;color:#fff;
  border:0;border-radius:99px;font:700 13px/1 Inter,system-ui,sans-serif;
  cursor:pointer;transition:background .18s;
}
.hcc2-btn-p:hover{background:#e18f07}
.hcc2-btn-s{
  flex:1;min-width:140px;height:42px;border:1.5px solid #e7edf4;border-radius:99px;
  font:700 13px/1 Inter,system-ui,sans-serif;color:#5c657a;background:#fff;
  cursor:pointer;transition:all .18s;text-decoration:none;
  display:flex;align-items:center;justify-content:center;
}
.hcc2-btn-s:hover{border-color:#f59e0b;color:#92400e}

/* Factors */
.hcc2-factors-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
@media(max-width:760px){.hcc2-factors-grid{grid-template-columns:1fr 1fr}}
@media(max-width:480px){.hcc2-factors-grid{grid-template-columns:1fr}}
.hcc2-factor{
  border:1px solid #e7edf4;border-radius:14px;padding:20px 18px;background:#fff;
}
.hcc2-factor-ico{
  width:44px;height:44px;border-radius:12px;background:#fff3cd;
  display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:12px;
}
.hcc2-factor-title{font:700 14px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 6px}
.hcc2-factor-text{font-size:13px;color:#5c657a;line-height:1.65;margin:0}

/* Compare */
.hcc2-compare-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
@media(max-width:640px){.hcc2-compare-grid{grid-template-columns:1fr}}
.hcc2-compare-card{
  border-radius:16px;padding:26px 20px;text-align:center;
  border:1.5px solid #e7edf4;background:#fff;
}
.hcc2-compare-card.best{border-color:#f59e0b;background:#fffbf0}
.hcc2-flag{font-size:38px;margin:0 0 8px}
.hcc2-country{font:700 11px/1 Inter,system-ui,sans-serif;color:#9ca3af;letter-spacing:.06em;text-transform:uppercase;margin:0 0 8px}
.hcc2-c-price{font:800 20px/1.2 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 8px}
.hcc2-c-desc{font-size:12px;color:#5c657a;line-height:1.55;margin:0 0 14px}
.hcc2-badge{display:inline-block;font:700 11px/1 Inter,system-ui,sans-serif;padding:5px 14px;border-radius:99px}
.badge-best{background:#d1fae5;color:#065f46}
.badge-hi{background:#fee2e2;color:#991b1b}

/* Diff grid */
.hcc2-diff-grid{display:grid;grid-template-columns:1fr 1fr;border:1px solid #e7edf4;border-radius:16px;overflow:hidden}
@media(max-width:580px){.hcc2-diff-grid{grid-template-columns:1fr}}
.hcc2-diff-item{
  padding:18px 16px;border-bottom:1px solid #e7edf4;
  display:flex;align-items:flex-start;gap:12px;
}
.hcc2-diff-item:nth-child(odd){border-right:1px solid #e7edf4}
.hcc2-diff-item:nth-last-child(-n+2){border-bottom:0}
@media(max-width:580px){.hcc2-diff-item{border-right:0!important}.hcc2-diff-item:last-child{border-bottom:0}}
.hcc2-diff-ico{
  width:38px;height:38px;border-radius:10px;background:#fff3cd;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:18px;
}
.hcc2-diff-title{font:700 13px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 4px}
.hcc2-diff-text{font-size:12px;color:#5c657a;line-height:1.6;margin:0}

/* FAQ */
.hcc2-faq-list{border:1px solid #e7edf4;border-radius:14px;overflow:hidden}
.hcc2-faq-item{border-bottom:1px solid #e7edf4}
.hcc2-faq-item:last-child{border-bottom:0}
.hcc2-faq-q{
  width:100%;display:flex;align-items:center;justify-content:space-between;gap:14px;
  padding:17px 20px;background:#fff;border:0;cursor:pointer;text-align:left;
  -webkit-tap-highlight-color:transparent;
}
.hcc2-faq-q:hover{background:#fafafa}
.hcc2-faq-qtext{font:700 14px/1.4 Inter,system-ui,sans-serif;color:#121a2c}
.hcc2-faq-ico{
  width:26px;height:26px;border-radius:8px;display:grid;place-items:center;
  flex-shrink:0;color:#f59e0b;font-size:14px;transition:.15s;
}
.hcc2-faq-q[aria-expanded="true"] .hcc2-faq-ico{transform:rotate(45deg)}
.hcc2-faq-a{
  padding:0 20px 16px;font-size:14px;line-height:1.72;color:#374151;
  display:none;
}
.hcc2-faq-a a{color:#b45309;font-weight:600}
.hcc2-faq-item.open .hcc2-faq-a{display:block}

/* Dark CTA */
.hcc2-dark-cta{
  background:linear-gradient(135deg,#0f172a 0%,#1e3058 100%);
  border-radius:20px;padding:44px 32px;text-align:center;
}
.hcc2-dark-cta h2{font:800 24px/1.3 Inter,system-ui,sans-serif;color:#fff;margin:0 0 10px}
.hcc2-dark-cta p{font-size:14px;color:rgba(255,255,255,.72);max-width:500px;margin:0 auto 26px;line-height:1.7}
.hcc2-dark-btns{display:flex;justify-content:center;gap:12px;flex-wrap:wrap}
.hcc2-dbtn-p{
  height:48px;padding:0 30px;background:#f59e0b;color:#fff;border:0;
  border-radius:99px;font:700 14px/1 Inter,system-ui,sans-serif;cursor:pointer;transition:background .18s;
}
.hcc2-dbtn-p:hover{background:#e18f07}
.hcc2-dbtn-o{
  height:48px;padding:0 30px;background:transparent;color:#fff;
  border:1.5px solid rgba(255,255,255,.38);border-radius:99px;
  font:700 14px/1 Inter,system-ui,sans-serif;cursor:pointer;transition:all .18s;
  text-decoration:none;display:flex;align-items:center;
}
.hcc2-dbtn-o:hover{border-color:#fff}
.hcc2-dark-pills{display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin-top:18px}
.hcc2-dark-pill{font-size:12px;color:rgba(255,255,255,.6);background:rgba(255,255,255,.1);border-radius:99px;padding:5px 14px}

/* Section layout helpers */
.hcc2-wrap{max-width:1200px;margin:0 auto;padding:0 22px}
.hcc2-sec{padding:52px 0}
.hcc2-sec-title{font:800 26px/1.3 Inter,system-ui,sans-serif;color:#121a2c;margin:0 0 8px;text-align:center}
.hcc2-sec-sub{font-size:15px;color:#5c657a;text-align:center;max-width:580px;margin:0 auto 28px;line-height:1.65}
.hcc2-divider{display:flex;align-items:center;justify-content:center;gap:10px;margin:0 0 28px}
.hcc2-divider-line{width:56px;height:1px;background:#d6dce5}
.hcc2-divider-cross{font-size:13px;color:#121a2c}

@media(max-width:600px){
  .hcc2-dark-cta{padding:30px 18px}
  .hcc2-sec{padding:36px 0}
}

.hcc2-step-num{
  display:inline-block;width:22px;height:22px;border-radius:50%;
  background:#f59e0b;color:#fff;font:800 11px/22px Inter,system-ui,sans-serif;
  text-align:center;margin-right:6px;vertical-align:middle;flex-shrink:0;
}
</style>

<div class="iht-about hcc2">

  <div class="brand-accent" aria-hidden="true"></div>

  <!-- ====== HERO ====== -->
  <div class="hcc2-hero">
    <div class="hcc2-wrap">
      <nav class="hcc2-breadcrumb" aria-label="Breadcrumb">
        <a href="<?= base_url() ?>">Home</a>
        <span class="sep">&#8250;</span>
        <a href="<?= base_url('hair-transplant-cost') ?>">Hair Transplant Cost</a>
        <span class="sep">&#8250;</span>
        <span style="color:rgba(255,255,255,.5)" aria-current="page">Cost Calculator</span>
      </nav>
      <p class="hcc2-eyebrow">India Hair Transplant &bull; IHT Clinics</p>
      <h1 class="hcc2-h1">Hair Transplant Cost Calculator</h1>
      <p class="hcc2-sub">Select your baldness grade, preferred technique, and IHT clinic city to get a transparent indicative cost range in seconds.</p>
    </div>
  </div>

  <!-- ====== CALCULATOR ====== -->
  <section class="hcc2-sec" style="background:#f6f8fb">
    <div class="hcc2-wrap">
      <div class="hcc2-calc-card">
        <p class="hcc2-card-h">Estimate your hair transplant cost</p>
        <p class="hcc2-card-sub">Indicative range based on clinical averages &bull; Results in under 10 seconds &bull; No login required</p>

        <!-- Step 1: Norwood Stage -->
        <p class="hcc2-stage-label">
          <span class="hcc2-step-num">1</span>
          Select your Norwood stage (baldness grade)
        </p>

        <div class="hcc2-nw-row" role="group" aria-label="Norwood stage selector" id="nwRow">

          <button type="button" class="hcc2-nw-btn" data-stage="1-2"
            data-grafts="800 &ndash; 1,200"
            data-sessions="1 Session"
            data-desc="<strong>Stage 1&ndash;2 &ndash; Minor recession.</strong> Very early hair loss. Non-surgical treatments like Minoxidil and PRP are typically sufficient at this stage."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#d1fae5"/>
              <rect x="4" y="4" width="52" height="8" rx="4" fill="#059669"/>
              <rect x="2" y="4" width="10" height="16" rx="4" fill="#059669"/>
              <rect x="48" y="4" width="10" height="16" rx="4" fill="#059669"/>
            </svg>
            <span class="hcc2-nw-num">1 &ndash; 2</span>
            <span class="hcc2-nw-text">Early</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="3"
            data-grafts="1,200 &ndash; 2,000"
            data-sessions="1 Session"
            data-desc="<strong>Stage 3 &ndash; Significant recession.</strong> M or V shaped hairline. First clinically significant grade. FUE is commonly recommended from this stage."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#fef9c3"/>
              <rect x="6" y="5" width="48" height="8" rx="4" fill="#ca8a04"/>
              <rect x="2" y="5" width="8" height="14" rx="4" fill="#ca8a04"/>
              <rect x="50" y="5" width="8" height="14" rx="4" fill="#ca8a04"/>
              <rect x="14" y="3" width="10" height="8" rx="4" fill="#fef9c3"/>
              <rect x="36" y="3" width="10" height="8" rx="4" fill="#fef9c3"/>
            </svg>
            <span class="hcc2-nw-num">3</span>
            <span class="hcc2-nw-text">Moderate</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="4"
            data-grafts="2,000 &ndash; 3,000"
            data-sessions="1 Session"
            data-desc="<strong>Stage 4 &ndash; Hairline and crown.</strong> Both areas affected with a band of hair still separating them. Single-session FUE typically planned."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#fef3c7"/>
              <rect x="8" y="6" width="44" height="8" rx="4" fill="#b45309"/>
              <rect x="2" y="6" width="8" height="12" rx="4" fill="#b45309"/>
              <rect x="50" y="6" width="8" height="12" rx="4" fill="#b45309"/>
              <ellipse cx="30" cy="28" rx="8" ry="6" fill="#b45309" opacity=".75"/>
              <rect x="10" y="4" width="8" height="8" rx="4" fill="#fef3c7"/>
              <rect x="42" y="4" width="8" height="8" rx="4" fill="#fef3c7"/>
            </svg>
            <span class="hcc2-nw-num">4</span>
            <span class="hcc2-nw-text">+ Crown</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="5"
            data-grafts="2,800 &ndash; 3,500"
            data-sessions="1 &ndash; 2 Sessions"
            data-desc="<strong>Stage 5 &ndash; Merging zones.</strong> The band between hairline and crown is narrowing. Careful staged planning ensures maximum coverage."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#fee2e2"/>
              <rect x="10" y="8" width="40" height="8" rx="4" fill="#dc2626"/>
              <rect x="2" y="8" width="8" height="10" rx="4" fill="#dc2626"/>
              <rect x="50" y="8" width="8" height="10" rx="4" fill="#dc2626"/>
              <ellipse cx="30" cy="26" rx="12" ry="8" fill="#dc2626" opacity=".75"/>
              <rect x="12" y="6" width="8" height="10" rx="4" fill="#fee2e2"/>
              <rect x="40" y="6" width="8" height="10" rx="4" fill="#fee2e2"/>
            </svg>
            <span class="hcc2-nw-num">5</span>
            <span class="hcc2-nw-text">Merging</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="6"
            data-grafts="3,500 &ndash; 5,000"
            data-sessions="2 Sessions"
            data-desc="<strong>Stage 6 &ndash; Advanced baldness.</strong> Front and crown zones have merged into one large bald area. Two sessions are commonly planned."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#fecaca"/>
              <rect x="2" y="10" width="8" height="8" rx="4" fill="#b91c1c"/>
              <rect x="50" y="10" width="8" height="8" rx="4" fill="#b91c1c"/>
              <ellipse cx="30" cy="20" rx="22" ry="12" fill="#b91c1c" opacity=".8"/>
            </svg>
            <span class="hcc2-nw-num">6</span>
            <span class="hcc2-nw-text">Advanced</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="7"
            data-grafts="5,000 &ndash; 7,000+"
            data-sessions="2+ Sessions"
            data-desc="<strong>Stage 7 &ndash; Extensive baldness.</strong> Only a horseshoe fringe of hair remains. Multi-session staged planning is essential for this grade."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="30" cy="22" rx="26" ry="14" fill="#fecaca"/>
              <rect x="2" y="14" width="7" height="8" rx="3" fill="#991b1b"/>
              <rect x="51" y="14" width="7" height="8" rx="3" fill="#991b1b"/>
              <ellipse cx="30" cy="22" rx="24" ry="11" fill="#fecaca"/>
            </svg>
            <span class="hcc2-nw-num">7</span>
            <span class="hcc2-nw-text">Extensive</span>
          </button>

          <button type="button" class="hcc2-nw-btn" data-stage="unknown"
            data-grafts="Assessment needed"
            data-sessions="TBD"
            data-desc="<strong>Not sure of your stage?</strong> Use our <a href='/hair-loss-assessment' style='color:#b45309;font-weight:700'>free hair loss assessment tool</a> to estimate your Norwood grade before calculating cost."
            onclick="hcc2NW(this)" aria-pressed="false">
            <span class="sel-badge">Selected</span>
            <svg class="hcc2-nw-icon" viewBox="0 0 60 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="30" cy="18" r="14" fill="#f3f4f6" stroke="#d1d5db" stroke-width="1.5"/>
              <text x="30" y="24" font-family="Inter,system-ui,sans-serif" font-size="16" font-weight="800" fill="#9ca3af" text-anchor="middle">?</text>
            </svg>
            <span class="hcc2-nw-num" style="color:#9ca3af">?</span>
            <span class="hcc2-nw-text">Not sure</span>
          </button>

        </div>

        <!-- Stage description bar -->
        <div class="hcc2-stage-bar hidden" id="hcc2StageBar">Select a stage above to see a description.</div>

        <!-- Step 2: Technique -->
        <p class="hcc2-stage-label" style="margin-top:4px">
          <span class="hcc2-step-num">2</span>
          Choose a technique
        </p>
        <div class="hcc2-tech-grid" role="group" aria-label="Technique selector" id="techGrid">
          <button type="button" class="hcc2-tech-btn" data-tech="fue" onclick="hcc2Tech(this)" aria-pressed="false">
            <div class="hcc2-tech-ico">&#128300;</div>
            <span class="hcc2-tech-name">FUE</span>
            <span class="hcc2-tech-desc">Standard, no linear scar</span>
          </button>
          <button type="button" class="hcc2-tech-btn" data-tech="unshaven" onclick="hcc2Tech(this)" aria-pressed="false">
            <div class="hcc2-tech-ico">&#9889;</div>
            <span class="hcc2-tech-name">Unshaven FUE</span>
            <span class="hcc2-tech-desc">No visible shave required</span>
          </button>
          <button type="button" class="hcc2-tech-btn" data-tech="fut" onclick="hcc2Tech(this)" aria-pressed="false">
            <div class="hcc2-tech-ico">&#127981;</div>
            <span class="hcc2-tech-name">FUT</span>
            <span class="hcc2-tech-desc">Strip method, lower cost</span>
          </button>
        </div>

        <!-- Step 3: City -->
        <p class="hcc2-stage-label">
          <span class="hcc2-step-num">3</span>
          Select IHT clinic city
        </p>
        <div class="hcc2-city-grid" role="group" aria-label="City selector" id="cityGrid">
          <button type="button" class="hcc2-city-btn" data-city="delhi" onclick="hcc2City(this)" aria-pressed="false">
            <span class="hcc2-city-ico">&#127961;</span> Delhi
          </button>
          <button type="button" class="hcc2-city-btn" data-city="ludhiana" onclick="hcc2City(this)" aria-pressed="false">
            <span class="hcc2-city-ico">&#127960;</span> Ludhiana
          </button>
          <button type="button" class="hcc2-city-btn" data-city="bangalore" onclick="hcc2City(this)" aria-pressed="false">
            <span class="hcc2-city-ico">&#127961;</span> Bangalore
          </button>
        </div>

        <!-- Calculate -->
        <button class="hcc2-calc-btn" onclick="hcc2Calc()">
          <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 7h6M9 12h6M9 17h4"/></svg>
          Calculate my estimate
        </button>

        <!-- Result -->
        <div class="hcc2-result" id="hcc2Result">
          <div class="hcc2-result-head">
            <span class="hcc2-result-pill" id="hcc2RPill">Norwood 4</span>
            <span class="hcc2-result-title" id="hcc2RTitle">FUE in Delhi &mdash; estimated cost range</span>
          </div>
          <div class="hcc2-stat-row">
            <div class="hcc2-stat">
              <p class="hcc2-stat-label">Graft range</p>
              <p class="hcc2-stat-val" id="hcc2RGrafts">2,000 &ndash; 3,000</p>
              <p class="hcc2-stat-sub">estimated grafts</p>
            </div>
            <div class="hcc2-stat">
              <p class="hcc2-stat-label">Cost estimate</p>
              <p class="hcc2-stat-val" id="hcc2RCost">Rs. 1,00,000 &ndash; 2,20,000</p>
              <p class="hcc2-stat-sub">indicative range</p>
            </div>
            <div class="hcc2-stat">
              <p class="hcc2-stat-label">Sessions</p>
              <p class="hcc2-stat-val" id="hcc2RSessions">1</p>
              <p class="hcc2-stat-sub">surgical sessions</p>
            </div>
          </div>
          <div class="hcc2-result-note" id="hcc2RNote"></div>
          <div class="hcc2-result-cta">
            <button class="hcc2-btn-p iht-popup-btn" data-popup="consult">Book a consultation</button>
            <a class="hcc2-btn-s" href="<?= base_url('hair-transplant-cost') ?>">Full cost breakdown &rarr;</a>
          </div>
        </div>

        <p style="margin-top:18px;font-size:12px;color:#9ca3af;text-align:center;line-height:1.65">
          <strong style="color:#6b7280">Disclaimer:</strong> All estimates are indicative and based on average clinical data. Exact graft count and final cost are confirmed only after a surgeon's personal scalp and donor assessment.
        </p>

      </div>
    </div>
  </section>

  <!-- ====== FACTORS ====== -->
  <section class="hcc2-sec">
    <div class="hcc2-wrap">
      <h2 class="hcc2-sec-title">What determines hair transplant cost in India?</h2>
      <div class="hcc2-divider" aria-hidden="true">
        <span class="hcc2-divider-line"></span>
        <span class="hcc2-divider-cross">&#10010;</span>
        <span class="hcc2-divider-line"></span>
      </div>
      <p class="hcc2-sec-sub">Six clinical and operational factors drive the final number. Understanding each helps you evaluate quotes accurately.</p>

      <div class="hcc2-factors-grid">
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#128200;</div>
          <h3 class="hcc2-factor-title">Graft count</h3>
          <p class="hcc2-factor-text">The biggest single driver. More grafts means more surgeon time and consumables. Graft need is set by your Norwood grade and the area to be covered.</p>
        </div>
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#128300;</div>
          <h3 class="hcc2-factor-title">Technique used</h3>
          <p class="hcc2-factor-text"><a href="<?= base_url('fut-hair-transplant') ?>">FUT</a> is most affordable per graft. <a href="<?= base_url('fue-hair-transplant') ?>">FUE</a> costs more due to precision extraction. <a href="<?= base_url('unshaven-hair-transplant') ?>">Unshaven FUE</a> carries a premium for added surgical complexity.</p>
        </div>
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#128104;&#8205;&#9877;</div>
          <h3 class="hcc2-factor-title">Surgeon experience</h3>
          <p class="hcc2-factor-text">Surgeon-led procedures cost more than technician-led sessions. The surgeon's skill directly determines graft survival rate, hairline design, and long-term result quality.</p>
        </div>
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#127963;</div>
          <h3 class="hcc2-factor-title">Clinic infrastructure</h3>
          <p class="hcc2-factor-text">Dedicated operating theatres, sterile environments, and trained support teams involve higher operational overhead, which is reflected in pricing.</p>
        </div>
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#128205;</div>
          <h3 class="hcc2-factor-title">City of treatment</h3>
          <p class="hcc2-factor-text"><a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a> and <a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a> typically have higher per-graft rates than <a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a>. Clinical quality at IHT is consistent across all three.</p>
        </div>
        <div class="hcc2-factor">
          <div class="hcc2-factor-ico">&#128138;</div>
          <h3 class="hcc2-factor-title">Post-op care</h3>
          <p class="hcc2-factor-text"><a href="<?= base_url('prp-hair-treatment') ?>">PRP sessions</a>, medications, and follow-up consultations contribute to total investment. At IHT, post-op guidance is standard care, not a separately billed add-on.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== COST TABLE ====== -->
  <section class="hcc2-sec" style="background:#f6f8fb">
    <div class="hcc2-wrap">
      <h2 class="hcc2-sec-title">Hair transplant cost breakdown by graft count</h2>
      <div class="hcc2-divider" aria-hidden="true">
        <span class="hcc2-divider-line"></span>
        <span class="hcc2-divider-cross">&#10010;</span>
        <span class="hcc2-divider-line"></span>
      </div>
      <p class="hcc2-sec-sub">India prices hair transplants on a per-graft basis. This table shows indicative ranges across techniques and Norwood grades.</p>

      <div class="iht-table-wrap" role="region" aria-label="Hair transplant cost by graft count" tabindex="0">
        <table class="iht-cost-table">
          <thead>
            <tr>
              <th>Norwood Grade</th>
              <th>Graft Count</th>
              <th>FUT Cost (Rs.)</th>
              <th>FUE Cost (Rs.)</th>
              <th>Sessions</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Stage 1 &ndash; 2</td><td>800 &ndash; 1,200</td><td>35,000 &ndash; 70,000</td><td>50,000 &ndash; 1,00,000</td><td>1</td></tr>
            <tr><td>Stage 3</td><td>1,200 &ndash; 2,000</td><td>55,000 &ndash; 1,00,000</td><td>70,000 &ndash; 1,60,000</td><td>1</td></tr>
            <tr><td>Stage 4</td><td>2,000 &ndash; 3,000</td><td>80,000 &ndash; 1,40,000</td><td>1,00,000 &ndash; 2,20,000</td><td>1</td></tr>
            <tr><td>Stage 5</td><td>2,800 &ndash; 3,500</td><td>1,00,000 &ndash; 1,70,000</td><td>1,20,000 &ndash; 2,80,000</td><td>1 &ndash; 2</td></tr>
            <tr><td>Stage 6</td><td>3,500 &ndash; 5,000</td><td>1,30,000 &ndash; 2,20,000</td><td>1,50,000 &ndash; 4,00,000</td><td>2</td></tr>
            <tr><td>Stage 7</td><td>5,000 &ndash; 7,000+</td><td>1,70,000 &ndash; 3,00,000</td><td>2,00,000 &ndash; 4,50,000+</td><td>2+</td></tr>
          </tbody>
        </table>
      </div>
      <div style="margin-top:14px;background:#fffbf0;border:1px solid #fcd34d;border-radius:10px;padding:12px 16px;font-size:13px;line-height:1.65;color:#6b5000">
        <strong style="color:#92400e">Note:</strong> All figures are indicative averages based on clinical data. IHT pricing is graft-based and confirmed only after a personal scalp assessment. Prices vary by technique and city.
      </div>
    </div>
  </section>

  <!-- ====== INDIA VS ABROAD ====== -->
  <section class="hcc2-sec">
    <div class="hcc2-wrap">
      <h2 class="hcc2-sec-title">Hair transplant cost: India vs UK vs USA</h2>
      <div class="hcc2-divider" aria-hidden="true">
        <span class="hcc2-divider-line"></span>
        <span class="hcc2-divider-cross">&#10010;</span>
        <span class="hcc2-divider-line"></span>
      </div>
      <p class="hcc2-sec-sub">India delivers equivalent or superior clinical outcomes at a fraction of Western costs. This is why IHT also sees patients from international locations.</p>

      <div class="hcc2-compare-grid">
        <div class="hcc2-compare-card best">
          <div class="hcc2-flag">&#127470;&#127475;</div>
          <p class="hcc2-country">India (IHT Clinics)</p>
          <p class="hcc2-c-price">Rs. 40 &ndash; 150 / graft</p>
          <p class="hcc2-c-desc">Full procedure from Rs. 60,000 to Rs. 4,50,000+. Surgeon-led. Transparent graft pricing across Delhi, Ludhiana, and Bangalore.</p>
          <span class="hcc2-badge badge-best">Best value</span>
        </div>
        <div class="hcc2-compare-card">
          <div class="hcc2-flag">&#127468;&#127463;</div>
          <p class="hcc2-country">United Kingdom</p>
          <p class="hcc2-c-price">GBP 2,000 &ndash; 15,000</p>
          <p class="hcc2-c-desc">Equivalent to Rs. 2.2L &ndash; Rs. 17L. High operational costs and limited specialist availability drive pricing up significantly.</p>
          <span class="hcc2-badge badge-hi">High cost</span>
        </div>
        <div class="hcc2-compare-card">
          <div class="hcc2-flag">&#127482;&#127480;</div>
          <p class="hcc2-country">United States</p>
          <p class="hcc2-c-price">USD 4,000 &ndash; 20,000</p>
          <p class="hcc2-c-desc">Equivalent to Rs. 3.3L &ndash; Rs. 16.6L. Quality varies widely by clinic. India delivers comparable outcomes at a fraction of the price.</p>
          <span class="hcc2-badge badge-hi">High cost</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== WHY IHT ====== -->
  <section class="hcc2-sec" style="background:#f6f8fb">
    <div class="hcc2-wrap">
      <h2 class="hcc2-sec-title">Why IHT pricing is transparent</h2>
      <div class="hcc2-divider" aria-hidden="true">
        <span class="hcc2-divider-line"></span>
        <span class="hcc2-divider-cross">&#10010;</span>
        <span class="hcc2-divider-line"></span>
      </div>
      <p class="hcc2-sec-sub">Every IHT patient receives a written cost breakdown before making any decision. No hidden charges, no intraoperative surprises.</p>

      <div class="hcc2-diff-grid">
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#128203;</div>
          <div><p class="hcc2-diff-title">Graft-based pricing only</p><p class="hcc2-diff-text">Charged on actual planned grafts after scalp assessment, not fixed packages that may not match your individual case.</p></div>
        </div>
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#128104;&#8205;&#9877;</div>
          <div><p class="hcc2-diff-title">Surgeon-led procedures</p><p class="hcc2-diff-text">All IHT procedures are planned and performed by qualified surgeons &ndash; not delegated to technicians. This is the standard of care at IHT, not an upgrade.</p></div>
        </div>
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#127978;</div>
          <div><p class="hcc2-diff-title">Three clinic cities</p><p class="hcc2-diff-text">Active clinics in <a href="<?= base_url('hair-transplant-in-delhi') ?>">Delhi</a>, <a href="<?= base_url('hair-transplant-in-ludhiana') ?>">Ludhiana</a>, and <a href="<?= base_url('hair-transplant-in-bangalore') ?>">Bangalore</a>. Patients choose the city most convenient to them.</p></div>
        </div>
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#128338;</div>
          <div><p class="hcc2-diff-title">No hidden post-op charges</p><p class="hcc2-diff-text">Post-operative care guidance, medication schedule, and follow-up consultations are part of planned care, not extra billing.</p></div>
        </div>
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#127891;</div>
          <div><p class="hcc2-diff-title">ISHRS-recognised expertise</p><p class="hcc2-diff-text"><a href="<?= base_url('dr-kapil-dua') ?>">Dr. Kapil Dua</a>, Chairman at IHT, is a Past President of ISHRS USA (2022&ndash;23) &ndash; the first Indian to hold this position.</p></div>
        </div>
        <div class="hcc2-diff-item">
          <div class="hcc2-diff-ico">&#128200;</div>
          <div><p class="hcc2-diff-title">Assessment before commitment</p><p class="hcc2-diff-text">Scalp analysis, donor assessment, hairline planning, and a written cost estimate are all provided before any decision is made.</p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== FAQ ====== -->
  <section class="hcc2-sec">
    <div class="hcc2-wrap">
      <h2 class="hcc2-sec-title">Frequently asked questions</h2>
      <div class="hcc2-divider" aria-hidden="true">
        <span class="hcc2-divider-line"></span>
        <span class="hcc2-divider-cross">&#10010;</span>
        <span class="hcc2-divider-line"></span>
      </div>

      <div class="hcc2-faq-list">

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">What is the per-graft hair transplant cost in India?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a">Per-graft cost in India typically ranges between Rs. 40 and Rs. 150, depending on the technique and surgeon experience. FUT procedures have a lower per-graft cost than FUE or Unshaven FUE. At IHT, pricing is graft-based and confirmed after a personal scalp assessment, so you only pay for what your case genuinely requires.</div>
        </div>

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">Why do prices vary so much between clinics in India?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a">The gap in pricing reflects who performs the procedure (surgeon vs technician), the clinic infrastructure, graft handling methodology, and transparency of the estimate. Very low per-graft costs often reflect technician-led sessions with minimal surgical oversight. When comparing clinics, always ask who performs extraction, who designs the hairline, and what post-operative care is included in the quote.</div>
        </div>

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">How many sessions will I need for a full restoration?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a">For most patients at Norwood Stages 3 and 4, a single session is sufficient for meaningful restoration. From Stage 5 and above, two sessions are often planned to maximise coverage without compromising donor supply. The number of sessions is always determined by the surgeon after evaluating donor density, scalp area, and the patient's long-term hair loss trajectory.</div>
        </div>

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">Does hair transplant cost include PRP treatment?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a"><a href="<?= base_url('prp-hair-treatment') ?>">PRP therapy</a> is typically a separate line item from the hair transplant procedure. It may be recommended before surgery to strengthen existing hair, or after the procedure to support graft survival and faster growth. At IHT, PRP is recommended based on clinical need, and its cost is communicated transparently at the time of planning.</div>
        </div>

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">Is EMI available for hair transplant at IHT?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a">Payment options and EMI availability vary by clinic location. Please speak with our patient care team at your preferred IHT clinic for information on payment arrangements. We encourage patients to first complete a consultation so that a precise cost is established before exploring financing options.</div>
        </div>

        <div class="hcc2-faq-item">
          <button class="hcc2-faq-q" aria-expanded="false">
            <span class="hcc2-faq-qtext">Is the final cost always what is quoted before surgery?</span>
            <span class="hcc2-faq-ico" aria-hidden="true">&#43;</span>
          </button>
          <div class="hcc2-faq-a">At IHT, the cost estimate provided after consultation reflects the planned graft count and technique. The final cost is not subject to intraoperative revision without patient discussion. If a surgeon identifies a material difference from the planned graft count during the procedure, patients are informed before proceeding. Our policy is full cost transparency from the planning stage through to surgery.</div>
        </div>

      </div>
    </div>
  </section>

  <!-- ====== CTA BANNER ====== -->
  <section class="hcc2-sec" style="background:#f6f8fb">
    <div class="hcc2-wrap">
      <div class="hcc2-dark-cta">
        <h2>Get a precise cost estimate for your case</h2>
        <p>Every hair loss case is different. The only way to get a genuinely accurate cost is a personal consultation where a surgeon evaluates your scalp, donor area, and graft requirements, then gives you a written estimate with zero obligation.</p>
        <div class="hcc2-dark-btns">
          <button class="hcc2-dbtn-p iht-popup-btn" data-popup="consult">Book a consultation</button>
          <a class="hcc2-dbtn-o" href="<?= base_url('hair-transplant-cost') ?>">Full cost breakdown &rarr;</a>
        </div>
        <div class="hcc2-dark-pills">
          <span class="hcc2-dark-pill">&#10003; Transparent graft-based pricing</span>
          <span class="hcc2-dark-pill">&#10003; Surgeon-led assessment</span>
          <span class="hcc2-dark-pill">&#10003; Delhi &bull; Ludhiana &bull; Bangalore</span>
        </div>
      </div>
    </div>
  </section>

</div><!-- /hcc2 -->

<script>
(function(){

var selStage = '';
var selTech  = '';
var selCity  = '';

var stageData = {
  '1-2':    {grafts:'800 &ndash; 1,200 grafts',    sessions:'1',   futMin:35000, futMax:70000,  fueMin:50000,  fueMax:100000},
  '3':      {grafts:'1,200 &ndash; 2,000 grafts',  sessions:'1',   futMin:55000, futMax:100000, fueMin:70000,  fueMax:160000},
  '4':      {grafts:'2,000 &ndash; 3,000 grafts',  sessions:'1',   futMin:80000, futMax:140000, fueMin:100000, fueMax:220000},
  '5':      {grafts:'2,800 &ndash; 3,500 grafts',  sessions:'1 &ndash; 2', futMin:100000,futMax:170000, fueMin:120000, fueMax:280000},
  '6':      {grafts:'3,500 &ndash; 5,000 grafts',  sessions:'2',   futMin:130000,futMax:220000, fueMin:150000, fueMax:400000},
  '7':      {grafts:'5,000 &ndash; 7,000+ grafts', sessions:'2+',  futMin:170000,futMax:300000, fueMin:200000, fueMax:450000},
  'unknown':{grafts:'Assessment needed',            sessions:'TBD', futMin:60000, futMax:450000, fueMin:80000,  fueMax:450000}
};
var cityMult  = {delhi:1.15, ludhiana:1.0, bangalore:1.15};
var techMult  = {fue:1.0, unshaven:1.2, fut:0.70};
var techLabel = {fue:'FUE', unshaven:'Unshaven FUE', fut:'FUT'};
var cityLabel = {delhi:'Delhi', ludhiana:'Ludhiana', bangalore:'Bangalore'};
var stageLabel= {'1-2':'Stage 1&ndash;2','3':'Stage 3','4':'Stage 4','5':'Stage 5','6':'Stage 6','7':'Stage 7','unknown':'Stage unknown'};

function fmtRs(n){
  if(n>=100000) return 'Rs. '+(Math.round(n/10000)/10).toFixed(1).replace('.0','')+'L';
  return 'Rs. '+(n).toLocaleString('en-IN');
}

window.hcc2NW = function(el){
  document.querySelectorAll('.hcc2-nw-btn').forEach(function(b){
    b.classList.remove('active');b.setAttribute('aria-pressed','false');
  });
  el.classList.add('active');el.setAttribute('aria-pressed','true');
  selStage = el.getAttribute('data-stage');
  var bar = document.getElementById('hcc2StageBar');
  bar.innerHTML = el.getAttribute('data-desc');
  bar.classList.remove('hidden');
};

window.hcc2Tech = function(el){
  document.querySelectorAll('.hcc2-tech-btn').forEach(function(b){
    b.classList.remove('active');b.setAttribute('aria-pressed','false');
  });
  el.classList.add('active');el.setAttribute('aria-pressed','true');
  selTech = el.getAttribute('data-tech');
};

window.hcc2City = function(el){
  document.querySelectorAll('.hcc2-city-btn').forEach(function(b){
    b.classList.remove('active');b.setAttribute('aria-pressed','false');
  });
  el.classList.add('active');el.setAttribute('aria-pressed','true');
  selCity = el.getAttribute('data-city');
};

window.hcc2Calc = function(){
  if(!selStage){alert('Please select your Norwood stage.');return;}
  if(!selTech) {alert('Please select a technique.');return;}
  if(!selCity) {alert('Please select an IHT clinic city.');return;}

  var d = stageData[selStage];
  var cm = cityMult[selCity]||1.0;
  var tm = techMult[selTech]||1.0;
  var bMin = (selTech==='fut')?d.futMin:d.fueMin;
  var bMax = (selTech==='fut')?d.futMax:d.fueMax;
  var fMin = Math.round(bMin*cm*tm/1000)*1000;
  var fMax = Math.round(bMax*cm*tm/1000)*1000;

  document.getElementById('hcc2RPill').innerHTML   = stageLabel[selStage];
  document.getElementById('hcc2RTitle').innerHTML  = techLabel[selTech]+' in '+cityLabel[selCity]+' &ndash; estimated cost range';
  document.getElementById('hcc2RGrafts').innerHTML = d.grafts;
  document.getElementById('hcc2RSessions').innerHTML = d.sessions;
  document.getElementById('hcc2RCost').innerHTML   = (selStage==='unknown') ? 'Needs assessment' : fmtRs(fMin)+' &ndash; '+fmtRs(fMax);
  document.getElementById('hcc2RNote').innerHTML   = '<strong>Based on:</strong> '+stageLabel[selStage]+' hair loss, '+techLabel[selTech]+' technique, '+cityLabel[selCity]+' clinic.'+(selStage==='unknown'?' Use our <a href="<?= base_url('hair-loss-assessment') ?>" style="color:#b45309;font-weight:700">hair loss assessment tool</a> to identify your grade first.':' This estimate is refined after a surgeon evaluates your scalp in person.');

  var panel = document.getElementById('hcc2Result');
  panel.classList.add('show');
  setTimeout(function(){panel.scrollIntoView({behavior:'smooth',block:'nearest'});},100);
};

// FAQ accordion
document.querySelectorAll('.hcc2-faq-q').forEach(function(btn){
  btn.addEventListener('click',function(){
    var item = this.closest('.hcc2-faq-item');
    var open = item.classList.contains('open');
    document.querySelectorAll('.hcc2-faq-item').forEach(function(i){
      i.classList.remove('open');
      i.querySelector('.hcc2-faq-q').setAttribute('aria-expanded','false');
      i.querySelector('.hcc2-faq-ico').innerHTML='&#43;';
    });
    if(!open){
      item.classList.add('open');
      this.setAttribute('aria-expanded','true');
      this.querySelector('.hcc2-faq-ico').innerHTML='&#8722;';
    }
  });
});

})();
</script>

<?= $this->endSection() ?>
