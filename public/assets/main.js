
function openDrawer(){
  const d = document.getElementById('drawer');
  d.classList.add('open');
  d.setAttribute('aria-hidden', 'false');
  document.body.style.overflow='hidden';
}
function closeDrawer(){
  const d = document.getElementById('drawer');
  d.classList.remove('open');
  d.setAttribute('aria-hidden', 'true');
  document.body.style.overflow='';
}



/* Hero slider */
(function(){
  const root   = document.getElementById('heroSlider');
  if(!root) return;

  const track  = document.getElementById('heroTrack');
  const slides = Array.from(track.children);
  const title  = document.getElementById('heroTitle');
  const dotsCt = document.getElementById('heroDots');
  const dots   = Array.from(dotsCt.children);
  const prev   = document.getElementById('heroPrev');
  const next   = document.getElementById('heroNext');

  let i = 0, timer, down=false, startX=0, baseX=0;

  function setTitle(idx){
    const t = slides[idx].getAttribute('data-title') || '';
    title.textContent = t;
  }

  function go(n, instant=false){
    i = (n + slides.length) % slides.length;
    const x = -i * track.clientWidth;
    track.style.transition = instant ? 'none' : 'transform .5s ease';
    track.style.transform  = `translate3d(${x}px,0,0)`;
    dots.forEach((d,idx)=> d.classList.toggle('active', idx===i));
    setTitle(i);
  }

  function auto(){ timer = setInterval(()=> go(i+1), 5000); }
  function stop(){ clearInterval(timer); }

  go(0,true); auto();

  prev.addEventListener('click', ()=>{ stop(); go(i-1); auto(); });
  next.addEventListener('click', ()=>{ stop(); go(i+1); auto(); });
  dots.forEach((d,idx)=> d.addEventListener('click', ()=>{ stop(); go(idx); auto(); }));

  window.addEventListener('resize', ()=> go(i,true));

  track.addEventListener('pointerdown', e=>{
    stop(); down=true; startX=e.clientX; baseX=-i*track.clientWidth;
    track.setPointerCapture(e.pointerId); track.style.transition='none';
  });
  track.addEventListener('pointermove', e=>{
    if(!down) return;
    const dx = e.clientX - startX;
    track.style.transform = `translate3d(${baseX+dx}px,0,0)`;
  });
  track.addEventListener('pointerup', e=>{
    if(!down) return; down=false;
    const dx = e.clientX - startX;
    const threshold = track.clientWidth * 0.18;
    if(dx < -threshold) go(i+1);
    else if(dx > threshold) go(i-1);
    else go(i);
    auto();
  });

  track.addEventListener('mouseenter', stop);
  track.addEventListener('mouseleave', auto);
  track.addEventListener('focusin',  stop);
  track.addEventListener('focusout', auto);
})();



/* Results carousel */
(function(){
  const wrap   = document.getElementById('resultsCarousel');
  if(!wrap) return;

  const track  = document.getElementById('rcTrack');
  const prev   = wrap.querySelector('.rc-prev');
  const next   = wrap.querySelector('.rc-next');

  function pageWidth(){
    const first = track.querySelector('.rc-slide');
    return first ? first.getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap || 0) : track.clientWidth;
  }

  function go(dir){
    track.scrollBy({ left: dir * pageWidth(), behavior:'smooth' });
  }

  let timer;
  function auto(){ timer = setInterval(()=> go(1), 3000); }
  function stop(){ clearInterval(timer); }

  if(prev) prev.addEventListener('click', ()=>{ stop(); go(-1); auto(); });
  if(next) next.addEventListener('click', ()=>{ stop(); go(1);  auto(); });

  track.addEventListener('mouseenter', stop);
  track.addEventListener('mouseleave', auto);
  track.addEventListener('focusin',  stop);
  track.addEventListener('focusout', auto);

  auto();
})();



/* Mobile accordion toggles (+ close drawer on link tap) */
document.addEventListener('click', function(e){
  const btn = e.target.closest('.expander');
  if(btn){
    const parent = btn.closest('.mitem.mhas-sub');
    if(parent){
      const open = parent.classList.toggle('mopen');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    }
  }
  const link = e.target.closest('.mnav a');
  if(link){ closeDrawer(); }
});



(function(){
  const modal = document.getElementById('ytModal');
  const frame = document.getElementById('ytFrame');
  if(!modal || !frame) return;

  function secondsFromT(t){
    if(!t) return 0;
    if(/^\d+$/.test(t)) return parseInt(t,10);
    let s = 0, m = t.match(/(\d+)m/), sec = t.match(/(\d+)s/);
    if(m) s += parseInt(m[1],10) * 60;
    if(sec) s += parseInt(sec[1],10);
    return s;
  }

  function buildEmbed(urlOrId){
    let id = urlOrId, start = 0;
    try{
      if(urlOrId.includes && urlOrId.includes('youtube.')){
        const u = new URL(urlOrId);
        id    = u.searchParams.get('v') || '';
        start = secondsFromT(u.searchParams.get('t'));
      }
    }catch(e){ /* ignore URL parse errors for plain IDs */ }

    const qs = new URLSearchParams({
      autoplay: 1,
      rel: 0,
      playsinline: 1,
      modestbranding: 1,
      start,
      origin: location.origin,
      enablejsapi: 1
    }).toString();

    // Use standard embed to avoid owner-restriction error 153
    return `https://www.youtube.com/embed/${id}?${qs}`;
  }

  function openYT(urlOrId){
    frame.src = buildEmbed(urlOrId);
    modal.classList.add('open');
    modal.setAttribute('aria-hidden','false');
    document.body.style.overflow='hidden';
  }

  function closeYT(){
    frame.src = '';
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden','true');
    document.body.style.overflow='';
  }

  document.addEventListener('click', (e)=>{
    const a = e.target.closest('.yt-card');
    if(a){
      e.preventDefault();
      const url = a.getAttribute('href') || '';
      const id  = a.dataset.yid || '';
      openYT(id || url);
    }
    if(e.target.hasAttribute('data-close')) closeYT();
  });

  document.addEventListener('keydown', (e)=>{
    if(e.key === 'Escape' && modal.classList.contains('open')) closeYT();
  });
})();



/* Doctors carousel */
(function initDoctorsCarousel(){
  const wrap  = document.getElementById('docsCarousel');  
  if(!wrap) return;

  const track = document.getElementById('docsTrack');
  const prev  = wrap.querySelector('.rc-prev');
  const next  = wrap.querySelector('.rc-next');

  function pageWidth(){
    const first = track.querySelector('.doc-slide');
    return first ? first.getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap || 0) : track.clientWidth;
  }
  function go(dir){ track.scrollBy({ left: dir * pageWidth(), behavior:'smooth' }); }

  let timer;
  function auto(){ timer = setInterval(()=> go(1), 3500); }
  function stop(){ clearInterval(timer); }

  prev.addEventListener('click', ()=>{ stop(); go(-1); auto(); });
  next.addEventListener('click', ()=>{ stop(); go(1);  auto(); });

  track.addEventListener('mouseenter', stop);
  track.addEventListener('mouseleave', auto);
  track.addEventListener('focusin',  stop);
  track.addEventListener('focusout', auto);

  auto();
})();



/* Baldness scale active state */
document.addEventListener('click', (e)=>{
  const b = e.target.closest('.scale-item');
  if(!b) return;
  const row = b.parentElement;
  row.querySelectorAll('.scale-item').forEach(x=>{
    x.classList.remove('active');
    x.setAttribute('aria-pressed','false');
  });
  b.classList.add('active');
  b.setAttribute('aria-pressed','true');
});



/* Services carousel (native scroll + dots) */
(function(){
  const track = document.getElementById('svcTrack');
  if(!track) return;
  const prev  = track.parentElement.querySelector('.rc-prev');
  const next  = track.parentElement.querySelector('.rc-next');
  const dotsEl= document.getElementById('svcDots');
  const dots  = Array.from(dotsEl.querySelectorAll('.dot'));

  function perView(){
    const slide = track.querySelector('.rc-slide');
    return Math.round(track.clientWidth / slide.clientWidth);
  }
  function pageWidth(){
    const slide = track.querySelector('.rc-slide');
    return slide.clientWidth + 22; // gap
  }
  function gotoPage(p){
    track.scrollTo({ left: p * pageWidth(), behavior: 'smooth' });
    dots.forEach((d,i)=>d.classList.toggle('active', i===p));
  }

  let page = 0;
  prev.addEventListener('click', ()=>{ page = Math.max(0, page-1); gotoPage(page); });
  next.addEventListener('click', ()=>{
    const total = track.querySelectorAll('.rc-slide').length;
    const pages = Math.max(0, total - perView());
    page = Math.min(pages, page+1); gotoPage(page);
  });
  dots.forEach((d,i)=> d.addEventListener('click', ()=>{ page=i; gotoPage(page); }));
})();



/* === FAQ Accordion (fixed) ===
   - Click question to toggle
   - Closes others (one-open-at-a-time)
   - Updates aria-expanded + [hidden] for accessibility
*/
(function(){
  const list = document.getElementById('faqList');
  if(!list) return;

  list.addEventListener('click', (e)=>{
    const q = e.target.closest('.faq-q');
    if(!q) return;

    const item = q.parentElement;
    const ans  = item.querySelector('.faq-a');
    const isOpen = q.getAttribute('aria-expanded') === 'true';

    // close all
    list.querySelectorAll('.faq-q').forEach(btn => btn.setAttribute('aria-expanded','false'));
    list.querySelectorAll('.faq-a').forEach(a => { a.hidden = true; });

    // open current if it was closed
    if(!isOpen){
      q.setAttribute('aria-expanded','true');
      ans.hidden = false;
    }
  });
})();


/* Clinics carousel */
(function(){
  const wrap  = document.querySelector('.clinics .results-carousel');
  if(!wrap) return;

  const track = document.getElementById('clinicsTrack');
  const prev  = wrap.querySelector('.rc-prev');
  const next  = wrap.querySelector('.rc-next');

  function pageWidth(){
    const first = track.querySelector('.rc-slide');
    const gap = parseFloat(getComputedStyle(track).gap || 0);
    return first ? first.getBoundingClientRect().width + gap : track.clientWidth;
  }
  function go(dir){
    track.scrollBy({ left: dir * pageWidth(), behavior: 'smooth' });
  }

  let timer;
  function auto(){ timer = setInterval(()=> go(1), 3500); }
  function stop(){ clearInterval(timer); }

  prev.addEventListener('click', ()=>{ stop(); go(-1); auto(); });
  next.addEventListener('click', ()=>{ stop(); go(1);  auto(); });

  track.addEventListener('mouseenter', stop);
  track.addEventListener('mouseleave', auto);
  track.addEventListener('focusin',  stop);
  track.addEventListener('focusout', auto);

  auto();
})();


/* ---------- Mobile drawer (you already call these from HTML) ---------- */
function openDrawer(){ const d=document.getElementById('drawer'); d.classList.add('open'); d.setAttribute('aria-hidden','false'); }
function closeDrawer(){ const d=document.getElementById('drawer'); d.classList.remove('open'); d.setAttribute('aria-hidden','true'); }

/* ---------- Generic carousel initializer (works for results/videos/services/clinics/docs) ---------- */
function initCarousel(root){
  const track = root.querySelector('.rc-track');
  const prev  = root.querySelector('.rc-prev');
  const next  = root.querySelector('.rc-next');
  if(!track || !prev || !next) return;

  const slides = track.querySelectorAll('.rc-slide');
  if(!slides.length) return;

  const getStep = () => {
    // width of a single slide including margin/padding
    const r = slides[0].getBoundingClientRect();
    // account for possible gap/padding on the track
    return Math.round(r.width);
  };

  const scrollByStep = dir => {
    track.scrollBy({ left: dir * getStep(), behavior: 'smooth' });
  };

  const clampButtons = () => {
    const max = track.scrollWidth - track.clientWidth - 1;
    prev.disabled = track.scrollLeft <= 1;
    next.disabled = track.scrollLeft >= max;
  };

  prev.addEventListener('click', () => scrollByStep(-1));
  next.addEventListener('click', () => scrollByStep(1));
  track.addEventListener('scroll', clampButtons);
  window.addEventListener('resize', clampButtons);

  // Optional: dot pagination support (services block)
  const dotsWrap = root.querySelector('.svc-dots');
  if(dotsWrap){
    const dots = Array.from(dotsWrap.querySelectorAll('.dot'));
    const goTo = idx => track.scrollTo({ left: idx * getStep(), behavior:'smooth' });
    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));
    const syncDots = () => {
      const idx = Math.round(track.scrollLeft / getStep());
      dots.forEach((d,j)=>d.classList.toggle('active', j===idx));
    };
    track.addEventListener('scroll', syncDots);
    window.addEventListener('resize', syncDots);
    syncDots();
  }

  // init state
  clampButtons();
}

/* boot all carousels on DOM ready */
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.results-carousel, .docs-carousel').forEach(initCarousel);
});

/* ---------- YouTube modal player ---------- */
(function(){
  const modal  = document.getElementById('ytModal');
  if(!modal) return;
  const frame  = document.getElementById('ytFrame');
  const open   = (yid) => {
    modal.classList.add('open'); modal.setAttribute('aria-hidden','false');
    frame.src = 'https://www.youtube.com/embed/' + yid + '?autoplay=1&rel=0&modestbranding=1';
  };
  const close  = () => {
    modal.classList.remove('open'); modal.setAttribute('aria-hidden','true');
    frame.src = '';
  };

  // open handlers on all .yt-card links
  document.addEventListener('click', (e) => {
    const a = e.target.closest('.yt-card');
    if(!a) return;
    const yid = a.getAttribute('data-yid');
    if(!yid) return;
    e.preventDefault();
    open(yid);
  });

  // close handlers
  modal.addEventListener('click', (e) => { if(e.target.hasAttribute('data-close') || e.target === modal) close(); });
  document.addEventListener('keydown', (e) => { if(e.key === 'Escape' && modal.classList.contains('open')) close(); });
})();
/* =========================================
   Auto flip 3rd-level dropdown on overflow
   Desktop only (doesn't affect mobile)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
  const isDesktop = () => window.matchMedia('(min-width: 992px)').matches;

  document.querySelectorAll('.dd-has-sub').forEach(item => {
    item.addEventListener('mouseenter', () => {
      if (!isDesktop()) return;

      const submenu = item.querySelector(':scope > .dd-sub');
      if (!submenu) return;

      // Reset
      item.classList.remove('open-left');

      // Force a measure AFTER it's able to render
      submenu.style.visibility = 'hidden';
      submenu.style.opacity = '1';
      submenu.style.display = 'block';

      const rect = submenu.getBoundingClientRect();
      const viewportWidth = window.innerWidth;

      // Restore controlled by CSS hover
      submenu.style.removeProperty('visibility');
      submenu.style.removeProperty('opacity');
      submenu.style.removeProperty('display');

      // Flip if it overflows right edge
      if (rect.right > viewportWidth - 10) {
        item.classList.add('open-left');
      }
    });

    item.addEventListener('mouseleave', () => {
      item.classList.remove('open-left');
    });
  });
});




/* =========================================================
   IHT Accordion Toggle
   data-accordion="multi" or "single"
========================================================= */
(function () {
  const accordions = document.querySelectorAll(".iht-acc");

  accordions.forEach((acc) => {
    const mode = acc.getAttribute("data-accordion") || "multi";
    const items = acc.querySelectorAll(".iht-acc-item");

    items.forEach((item) => {
      const btn = item.querySelector(".iht-acc-q");
      const panel = item.querySelector(".iht-acc-a");
      if (!btn || !panel) return;

      btn.addEventListener("click", () => {
        const isOpen = btn.getAttribute("aria-expanded") === "true";

        if (mode === "single") {
          items.forEach((other) => {
            const ob = other.querySelector(".iht-acc-q");
            const op = other.querySelector(".iht-acc-a");
            if (!ob || !op) return;
            ob.setAttribute("aria-expanded", "false");
            op.hidden = true;
          });
        }

        btn.setAttribute("aria-expanded", String(!isOpen));
        panel.hidden = isOpen;
      });
    });
  });
})();













/* =========================================================
   Drawer open/close (safe even if main.js missing these)
   ========================================================= */
function openDrawer(){
  const drawer = document.getElementById('drawer');
  const burger = document.querySelector('.hamburger');
  if(!drawer) return;

  drawer.classList.add('open');
  drawer.setAttribute('aria-hidden','false');
  document.body.classList.add('no-scroll');

  if(burger) burger.setAttribute('aria-expanded','true');
}
function closeDrawer(){
  const drawer = document.getElementById('drawer');
  const burger = document.querySelector('.hamburger');
  if(!drawer) return;

  drawer.classList.remove('open');
  drawer.setAttribute('aria-hidden','true');
  document.body.classList.remove('no-scroll');

  if(burger) burger.setAttribute('aria-expanded','false');
}

/* =========================================================
   MOBILE accordion (2nd + 3rd level) - opens next .msub only
   ========================================================= */
document.addEventListener("DOMContentLoaded", function () {
  const mnav = document.querySelector(".mnav");
  if (!mnav) return;

  // Hide all mobile submenus on load
  mnav.querySelectorAll(".msub").forEach((sub) => {
    sub.style.display = "none";
  });

  mnav.addEventListener("click", function (e) {
    const btn = e.target.closest(".expander");
    if (!btn) return;

    e.preventDefault();
    e.stopPropagation();

    const parentItem = btn.closest(".mitem.mhas-sub");
    if (!parentItem) return;

    const sub = parentItem.nextElementSibling;
    if (!sub || !sub.classList.contains("msub")) return;

    const isOpen = parentItem.classList.contains("is-open");

    // close siblings at SAME level (clean UX)
    const siblings = Array.from(parentItem.parentElement.children);
    siblings.forEach((el) => {
      if (el.classList && el.classList.contains("mitem") && el !== parentItem) {
        el.classList.remove("is-open");
        const sibSub = el.nextElementSibling;
        if (sibSub && sibSub.classList.contains("msub")) {
          sibSub.style.display = "none";
          const sibBtn = el.querySelector(".expander");
          if (sibBtn) sibBtn.setAttribute("aria-expanded", "false");
        }
      }
    });

    // toggle current
    if (isOpen) {
      parentItem.classList.remove("is-open");
      sub.style.display = "none";
      btn.setAttribute("aria-expanded", "false");
    } else {
      parentItem.classList.add("is-open");
      sub.style.display = "block";
      btn.setAttribute("aria-expanded", "true");
    }
  });
});

/* =========================================
   Desktop 3rd-level overflow flip (keep)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
  const items = document.querySelectorAll('.dd-has-sub');

  items.forEach(item => {
    item.addEventListener('mouseenter', () => {
      const submenu = item.querySelector('.dd-sub');
      if (!submenu) return;

      item.classList.remove('open-left');

      const rect = submenu.getBoundingClientRect();
      const viewportWidth = window.innerWidth;

      if (rect.right > viewportWidth - 10) {
        item.classList.add('open-left');
      }
    });

    item.addEventListener('mouseleave', () => {
      item.classList.remove('open-left');
    });
  });
});

