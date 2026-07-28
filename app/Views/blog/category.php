<?php


$cat = $iht_categories[$slug];
$all_posts = iht_posts_by_category($slug, $iht_posts);
$cards_per_pg = 9;
$total = count($all_posts);
$total_pages = max(1, (int) ceil($total / $cards_per_pg));
$current_page = max(1, min($total_pages, (int) (service('request')->getGet('page') ?? 1)));
$offset = ($current_page - 1) * $cards_per_pg;
$page_cards = array_slice($all_posts, $offset, $cards_per_pg);
$base_url = base_url('blog/' . $slug) . '/';
?>
<?= $this->extend('layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/blog.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/blog-category.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main class="blog-main" id="top">

  <!-- ====================================================
       HERO
       ==================================================== -->
  <section class="bm-hero" aria-labelledby="catHeading">
    <div class="container hero-top">

      <div>
        <nav class="cat-breadcrumb" aria-label="Breadcrumb">
          <a href="<?= base_url() ?>">Home</a>
          <span aria-hidden="true">&#8250;</span>
          <a href="<?= base_url('blog') ?>/">Blog</a>
          <span aria-hidden="true">&#8250;</span>
          <span aria-current="page"><?= $cat['heading'] ?></span>
        </nav>
        <h1 id="catHeading"><?= $cat['heading'] ?></h1>
        <p class="sub"><?= $cat['subheading'] ?></p>
      </div>

      <div class="hero-search" role="search">
        <label style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0);" for="catSearch">Search in this category</label>
        <div class="searchbox">
          <span class="search-ico" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm11.7 2.3-5.1-5.1a10 10 0 1 0-1.4 1.4l5.1 5.1a1 1 0 0 0 1.4-1.4Z"/></svg>
          </span>
          <input id="catSearch" type="search" placeholder="Search <?= strip_tags($cat['heading']) ?> articles&hellip;" autocomplete="off" />
          <button class="search-btn" id="catSearchBtn" type="button">Search</button>
        </div>
        <p class="search-hint"><a href="<?= base_url('blog') ?>/">&#8592; Back to all categories</a></p>
      </div>

    </div>
  </section>

  <!-- ====================================================
       CATEGORY PILLS — active state on current category
       ==================================================== -->
  <section class="bm-topics" aria-label="Browse by topic">
    <div class="container">
      <div class="section-head">
        <h2>All Categories</h2>
        <p class="section-note">Browse by category</p>
      </div>
      <nav class="pill-wrap" aria-label="Blog categories">
        <?php foreach ($iht_categories as $s => $c): ?>
        <a class="pill<?= $s === $slug ? ' pill--active' : '' ?>"
           href="<?= base_url('blog') ?>/<?= $s ?>/"
           <?= $s === $slug ? 'aria-current="page"' : '' ?>><?= $c['label'] ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
  </section>

  <!-- No-results message -->
  <div id="catNoResults" class="blog-no-results" style="display:none;">
    <div class="container">
      <div class="no-results-inner">
        <svg viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <circle cx="22" cy="22" r="15" stroke="currentColor" stroke-width="2.5"/>
          <path d="M33 33l8 8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <path d="M16 22h12M22 16v12" stroke="currentColor" stroke-width="2" stroke-linecap="round" opacity=".35"/>
        </svg>
        <h3>No articles found</h3>
        <p>Try a different keyword or <a href="<?= base_url('blog') ?>/">browse all categories</a>.</p>
        <button type="button" class="no-results-clear"
          onclick="document.getElementById('catSearch').value='';document.getElementById('catSearch').dispatchEvent(new Event('input'));">
          Clear search
        </button>
      </div>
    </div>
  </div>

  <!-- ====================================================
       ARTICLE GRID
       ==================================================== -->
  <section class="bm-block" id="cat-articles" aria-labelledby="cat-articles-h">
    <div class="container">

      <div class="block-head">
        <h2 id="cat-articles-h">
          <?= $cat['heading'] ?>
          <?php if ($total_pages > 1): ?>
            <span class="cat-page-info">Page <?= $current_page ?> of <?= $total_pages ?></span>
          <?php endif; ?>
        </h2>
        <span class="cat-count" id="catCount"><?= $total ?> article<?= $total !== 1 ? 's' : '' ?></span>
      </div>

      <?php if (empty($page_cards)): ?>
        <p style="color:var(--bl-muted);padding:20px 0;">No articles found in this category yet.</p>
      <?php else: ?>
      <div class="cat-grid" id="catGrid">
        <?php foreach ($page_cards as $p): ?>
        <?= iht_render_card($p) ?>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- PAGINATION -->
      <?php if ($total_pages > 1): ?>
      <nav class="cat-pagination" aria-label="Page navigation">

        <?php if ($current_page > 1): ?>
          <a class="pg-btn pg-prev" href="<?= $base_url ?>?page=<?= $current_page - 1 ?>" aria-label="Previous page">&#8249; Prev</a>
        <?php else: ?>
          <span class="pg-btn pg-prev pg-disabled" aria-disabled="true">&#8249; Prev</span>
        <?php endif; ?>

        <div class="pg-numbers">
          <?php
          // Smart page number display: show max 5 page links with ellipsis
          $window = 2;
          $pages_to_show = [];
          for ($p = 1; $p <= $total_pages; $p++) {
            if ($p === 1 || $p === $total_pages || abs($p - $current_page) <= $window) {
              $pages_to_show[] = $p;
            }
          }
          $prev_p = null;
          foreach ($pages_to_show as $p):
            if ($prev_p && $p - $prev_p > 1): ?>
              <span class="pg-ellipsis">&hellip;</span>
            <?php endif;
            if ($p === $current_page): ?>
              <span class="pg-num pg-current" aria-current="page"><?= $p ?></span>
            <?php else: ?>
              <a class="pg-num" href="<?= $base_url ?>?page=<?= $p ?>"><?= $p ?></a>
            <?php endif;
            $prev_p = $p;
          endforeach; ?>
        </div>

        <?php if ($current_page < $total_pages): ?>
          <a class="pg-btn pg-next" href="<?= $base_url ?>?page=<?= $current_page + 1 ?>" aria-label="Next page">Next &#8250;</a>
        <?php else: ?>
          <span class="pg-btn pg-next pg-disabled" aria-disabled="true">Next &#8250;</span>
        <?php endif; ?>

      </nav>
      <?php endif; ?>

    </div>
  </section>

</main>

<script>
(function () {
  var input    = document.getElementById('catSearch');
  var btn      = document.getElementById('catSearchBtn');
  var noResult = document.getElementById('catNoResults');
  var grid     = document.getElementById('catGrid');
  var countEl  = document.getElementById('catCount');
  if (!input || !grid) return;

  var cards = Array.from(grid.querySelectorAll('.blog-card[data-title]'));

  var run = function () {
    var q = input.value.trim().toLowerCase();
    var visible = 0;
    cards.forEach(function (c) {
      var match = !q || (c.getAttribute('data-title') || '').toLowerCase().includes(q);
      c.classList.toggle('is-hidden', !match);
      if (match) visible++;
    });
    if (countEl) countEl.textContent = visible + (visible === 1 ? ' article' : ' articles');
    if (noResult) noResult.style.display = (q && !visible) ? 'block' : 'none';
  };

  input.addEventListener('input', run);
  if (btn) btn.addEventListener('click', run);
  input.addEventListener('keydown', function (e) { if (e.key === 'Escape') { input.value = ''; run(); } });
})();
</script>

<?= $this->endSection() ?>
