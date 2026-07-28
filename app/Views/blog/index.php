<?php
/**
 * Blog Index — /blog/index.php
 * All post data comes from blogs-data.php
 * To add/edit posts: edit blogs-data.php only.
 */

?>
<?= $this->extend('layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/blog.css?=u') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<main class="blog-main" id="top">

  <!-- ====================================================
       HERO
       ==================================================== -->
  <section class="bm-hero" aria-labelledby="blogHeading">
    <div class="container hero-top">

      <div>
        <h1 id="blogHeading">Hair Loss &amp; Transplant Blog</h1>
        <p class="sub">
          Practical, patient-first articles on hair loss causes, treatments, hair transplant
          planning, recovery, and cost &mdash; written and reviewed by IHT specialists.
        </p>
      </div>

      <div class="hero-search" role="search">
        <label style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0);" for="blogSearch">Search blog articles</label>
        <div class="searchbox">
          <span class="search-ico" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm11.7 2.3-5.1-5.1a10 10 0 1 0-1.4 1.4l5.1 5.1a1 1 0 0 0 1.4-1.4Z"/></svg>
          </span>
          <input id="blogSearch" type="search" placeholder="Search articles (e.g., FUE, recovery, cost&hellip;)" autocomplete="off" />
          <button class="search-btn" id="searchBtn" type="button">Search</button>
        </div>
        <p class="search-hint">Try: &ldquo;finasteride&rdquo;, &ldquo;PRP&rdquo;, &ldquo;hairline&rdquo;, &ldquo;recovery&rdquo;, &ldquo;cost&rdquo;.</p>
      </div>

    </div>
  </section><!-- /bm-hero -->

  <!-- ====================================================
       TOPICS PILLS
       ==================================================== -->
  <section class="bm-topics" id="topics" aria-label="Browse by topic">
    <div class="container">
      <div class="section-head">
        <h2>Topics</h2>
        <p class="section-note">Browse by category</p>
      </div>
      <nav class="pill-wrap" aria-label="Blog categories">
        <?php foreach ($iht_categories as $slug => $cat): ?>
        <a class="pill" href="<?= base_url('blog') ?>/<?= $slug ?>/"><?= $cat['label'] ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
  </section><!-- /bm-topics -->

  <!-- No-results message -->
  <div id="blogNoResults" style="display:none;" class="blog-no-results">
    <div class="container">
      <div class="no-results-inner">
        <svg viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <circle cx="22" cy="22" r="15" stroke="currentColor" stroke-width="2.5"/>
          <path d="M33 33l8 8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <path d="M16 22h12M22 16v12" stroke="currentColor" stroke-width="2" stroke-linecap="round" opacity=".35"/>
        </svg>
        <h3>No articles found</h3>
        <p>Try a different keyword like <strong>PRP</strong>, <strong>FUE</strong>, <strong>recovery</strong>, or <strong>cost</strong>.</p>
        <button type="button" class="no-results-clear"
          onclick="document.getElementById('blogSearch').value='';document.getElementById('blogSearch').dispatchEvent(new Event('input'));">
          Clear search
        </button>
      </div>
    </div>
  </div>

  <!-- ====================================================
       CATEGORY SECTIONS — one per category, auto-generated
       ==================================================== -->
  <?php foreach ($iht_categories as $cat_slug => $cat):
    $cat_posts = iht_posts_by_category($cat_slug, $iht_posts);
    if (empty($cat_posts)) continue;
    $section_id = 'cat-' . $cat_slug;
    $heading_id = 'h-' . $cat_slug;
  ?>
  <section class="bm-block" id="<?= $section_id ?>" data-scroll-section aria-labelledby="<?= $heading_id ?>">
    <div class="container">
      <div class="block-head">
        <h2 id="<?= $heading_id ?>">
          <?= $cat['label'] ?>
          <a class="cat-view-all" href="<?= base_url('blog') ?>/<?= $cat_slug ?>/" aria-label="View all <?= strip_tags($cat['label']) ?> articles">
            View all &#8250;
          </a>
        </h2>
        <div class="scroll-arrows" aria-label="Scroll <?= strip_tags($cat['label']) ?> posts">
          <button class="sc-btn" type="button" data-scroll="left"  aria-label="Scroll left">&#8249;</button>
          <button class="sc-btn" type="button" data-scroll="right" aria-label="Scroll right">&#8250;</button>
        </div>
      </div>
      <div class="scroller" data-scroller>
        <?php foreach ($cat_posts as $p): ?>
        <?= iht_render_card($p) ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endforeach; ?>

</main><!-- /blog-main -->

<script>
(function () {
  /* SEARCH */
  var input    = document.getElementById('blogSearch');
  var btn      = document.getElementById('searchBtn');
  var noResult = document.getElementById('blogNoResults');
  if (!input) return;
  var cards    = Array.from(document.querySelectorAll('.blog-card[data-title]'));
  var sections = Array.from(document.querySelectorAll('[data-scroll-section]'));

  var run = function () {
    var q = input.value.trim().toLowerCase();
    cards.forEach(function (c) {
      c.classList.toggle('is-hidden', q.length > 0 && !(c.getAttribute('data-title') || '').toLowerCase().includes(q));
    });
    sections.forEach(function (s) {
      if (!q.length) { s.style.display = ''; return; }
      s.style.display = s.querySelectorAll('.blog-card:not(.is-hidden)').length ? '' : 'none';
    });
    if (noResult) {
      var vis = cards.filter(function (c) { return !c.classList.contains('is-hidden'); }).length;
      noResult.style.display = (q.length && !vis) ? 'block' : 'none';
    }
  };

  input.addEventListener('input', run);
  if (btn) btn.addEventListener('click', run);
  input.addEventListener('keydown', function (e) { if (e.key === 'Escape') { input.value = ''; run(); } });
})();

(function () {
  /* SCROLL ARROWS */
  document.querySelectorAll('[data-scroll-section]').forEach(function (sec) {
    var sc = sec.querySelector('[data-scroller]');
    var l  = sec.querySelector('[data-scroll="left"]');
    var r  = sec.querySelector('[data-scroll="right"]');
    if (!sc || !l || !r) return;
    var step = function () { return Math.min(360, sc.clientWidth * 0.85); };
    l.addEventListener('click', function () { sc.scrollBy({ left: -step(), behavior: 'smooth' }); });
    r.addEventListener('click', function () { sc.scrollBy({ left:  step(), behavior: 'smooth' }); });
  });
})();
</script>

<?= $this->endSection() ?>