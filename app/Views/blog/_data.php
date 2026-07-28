<?php

helper('url');
/**
 * ================================================================
 *  BLOG DATA — blogs-data.php
 *  Location: /blog/blogs-data.php
 * ================================================================
 *
 *  THIS IS THE ONLY FILE YOU NEED TO EDIT to manage blog posts.
 *
 *  Included by:
 *    - /blog/index.php          (main blog listing)
 *    - /blog/blog-category.php  (all 10 category pages)
 *
 *  HOW TO ADD A NEW POST:
 *  1. Copy any existing post array below
 *  2. Fill in: slug, category_slug, title, desc, img, alt, tag, date, read_time
 *  3. Save the file — post appears instantly on index + category page
 *
 *  HOW TO EDIT A POST:
 *  Just find it below and update any field. Done.
 *
 *  HOW TO MOVE A POST TO A DIFFERENT CATEGORY:
 *  Change its category_slug value to another valid slug.
 *
 * ================================================================
 *
 *  VALID CATEGORY SLUGS:
 *    hair-loss
 *    hair-transplant
 *    hair-transplant-cost
 *    transplant-techniques
 *    recovery-aftercare
 *    non-surgical-treatments
 *    hair-loss-medications
 *    scalp-conditions
 *    womens-hair-loss
 *    results-recovery
 *
 * ================================================================
 */

/* ============================================================
   CATEGORIES — defines slugs, labels, meta, page descriptions
   ============================================================ */
$iht_categories = [

  'hair-loss' => [
    'label'      => 'Hair Loss',
    'title'      => 'Hair Loss Types, Causes &amp; Diagnosis | IHT Blog',
    'desc'       => 'Expert articles on all types of hair loss — androgenetic alopecia, telogen effluvium, alopecia areata, traction alopecia — causes, patterns, and diagnosis explained.',
    'canonical'  => 'https://indiahairtransplant.com/blog/hair-loss/',
    'heading'    => 'Hair Loss',
    'subheading' => 'Understanding your type of hair loss is the first step to the right treatment. Browse expert articles on causes, patterns, and how different types are diagnosed in India.',
  ],

  'hair-transplant' => [
    'label'      => 'Hair Transplant',
    'title'      => 'Hair Transplant Guides &amp; Articles | IHT Blog',
    'desc'       => 'In-depth articles on hair transplant procedures — candidacy, planning, slit making, graft handling, hairline design, and what to expect before and after surgery.',
    'canonical'  => 'https://indiahairtransplant.com/blog/hair-transplant/',
    'heading'    => 'Hair Transplant',
    'subheading' => 'Everything you need to know about hair transplant procedures — from planning and candidacy to surgical steps, graft handling, and what makes results look natural.',
  ],

  'hair-transplant-cost' => [
    'label'      => 'Hair Transplant Cost',
    'title'      => 'Hair Transplant Cost in India | IHT Blog',
    'desc'       => 'Clear, honest articles on hair transplant cost in India — how graft pricing works, what is included, why prices vary across clinics, and how to avoid unsafe cheap packages.',
    'canonical'  => 'https://indiahairtransplant.com/blog/hair-transplant-cost/',
    'heading'    => 'Hair Transplant Cost',
    'subheading' => 'Transparent, no-jargon articles on how hair transplant pricing actually works in India — graft-wise cost, what is included, and why the cheapest option is rarely the safest.',
  ],

  'transplant-techniques' => [
    'label'      => 'Transplant &amp; Techniques',
    'title'      => 'Hair Transplant Techniques: FUE, DHI, Bio-FUE | IHT Blog',
    'desc'       => 'Detailed guides on FUE, Bio-FUE, DHI, FUT, and unshaven hair transplant techniques — how each works, who it suits, and differences in cost and outcomes.',
    'canonical'  => 'https://indiahairtransplant.com/blog/transplant-techniques/',
    'heading'    => 'Transplant &amp; Techniques',
    'subheading' => 'Not all hair transplant techniques are the same. These articles break down FUE, Bio-FUE, DHI, FUT and unshaven methods — how each works and which suits different hair loss cases.',
  ],

  'recovery-and-aftercare' => [
    'label'      => 'Recovery &amp; Aftercare',
    'title'      => 'Hair Transplant Recovery &amp; Aftercare | IHT Blog',
    'desc'       => 'Week-by-week recovery guides, post-op dos and don\'ts, shock loss, washing instructions, and realistic growth timelines after a hair transplant in India.',
    'canonical'  => 'https://indiahairtransplant.com/blog/recovery-and-aftercare/',
    'heading'    => 'Recovery &amp; Aftercare',
    'subheading' => 'What happens after the procedure matters as much as the surgery itself. Walk through recovery day by day — shedding, growth, and what is normal vs what needs attention.',
  ],

  'non-surgical-treatments' => [
    'label'      => 'Non-Surgical Treatments',
    'title'      => 'PRP, GFC &amp; Non-Surgical Hair Loss Treatments | IHT Blog',
    'desc'       => 'Articles on PRP therapy, GFC treatment, LLLT, minoxidil, and other non-surgical hair loss options — who benefits, how many sessions, and realistic outcomes.',
    'canonical'  => 'https://indiahairtransplant.com/blog/non-surgical-treatments/',
    'heading'    => 'Non-Surgical Treatments',
    'subheading' => 'Surgery is not always the first answer. These articles explain non-surgical hair loss treatments — PRP, GFC, LLLT, minoxidil — who they help and what realistic outcomes look like.',
  ],

  'hair-loss-medications' => [
    'label'      => 'Hair Loss Medications',
    'title'      => 'Hair Loss Medications &amp; Prescription Treatments | IHT Blog',
    'desc'       => 'Evidence-based articles on finasteride, minoxidil, dutasteride, and other hair loss medications — how they work, who they suit, side effects, and when to consult a doctor.',
    'canonical'  => 'https://indiahairtransplant.com/blog/hair-loss-medications/',
    'heading'    => 'Hair Loss Medications',
    'subheading' => 'Prescription and OTC hair loss medications explained honestly — what the clinical evidence says, who they are suitable for, and why self-medicating carries real risks.',
  ],

  'scalp-conditions' => [
    'label'      => 'Scalp Conditions',
    'title'      => 'Scalp Conditions &amp; Scalp Health | IHT Blog',
    'desc'       => 'Articles on dandruff, seborrheic dermatitis, scalp psoriasis, scalp folliculitis, alopecia areata, and other scalp conditions that affect hair health in India.',
    'canonical'  => 'https://indiahairtransplant.com/blog/scalp-conditions/',
    'heading'    => 'Scalp Conditions',
    'subheading' => 'A healthy scalp is the foundation of healthy hair. These articles cover common scalp conditions — what causes them, how they are diagnosed, and what treatment options are available.',
  ],

  'womens-hair-loss' => [
    'label'      => 'Women\'s Hair Loss',
    'title'      => 'Women\'s Hair Loss &amp; Female Hair Transplant | IHT Blog',
    'desc'       => 'Articles on female pattern hair loss, postpartum shedding, PCOS-related hair loss, hormonal causes, PRP for women, and female hair transplant options in India.',
    'canonical'  => 'https://indiahairtransplant.com/blog/womens-hair-loss/',
    'heading'    => 'Women\'s Hair Loss',
    'subheading' => 'Hair loss in women is often different from men — causes, patterns, and treatment options vary. These articles cover hormonal triggers through to female hair transplant suitability.',
  ],

  'results-and-case-studies' => [
    'label'      => 'Results &amp; Recovery',
    'title'      => 'Hair Transplant Results &amp; Before After | IHT Blog',
    'desc'       => 'Honest articles on hair transplant results — what to expect at 3, 6, and 12 months, graft survival rates, success factors, and how to evaluate clinic outcomes.',
    'canonical'  => 'https://indiahairtransplant.com/blog/results-recovery/',
    'heading'    => 'Results &amp; Recovery',
    'subheading' => 'Setting realistic expectations is part of a successful hair transplant. These articles explain what results look like over time and what factors most influence the final outcome.',
  ],

]; // end $iht_categories


/* ============================================================
   BLOG POSTS
   ============================================================
   Each post has:
     slug           — URL of the article (e.g. /hair-transplant-recovery-timeline)
     category_slug  — must match a key in $iht_categories above
     title          — article heading shown on cards
     desc           — short description shown on cards
     img            — thumbnail image URL
     alt            — image alt text (describe the image, not the article)
     tag            — small badge shown on the image (short label)
     date           — display date (e.g. Dec 11, 2025)
     read_time      — e.g. 8 min read
   ============================================================ */



$iht_posts = [
    
    [
    'slug'          => '/blog/hair-transplant-clinic-in-delhi',
    'category_slug' => 'hair-transplant',
    'title'         => 'Hair Transplant in Delhi: What to Know Before You Choose a Clinic',
    'desc'          => 'Techniques, cost, surgeon credentials to verify, and Delhi-specific aftercare considerations &mdash; everything to evaluate before booking your procedure.',
    'img'           => '/assets/images/blog/hair-transplant-in-delhi.webp',
    'alt'           => 'Hair transplant clinic consultation in Delhi at IHT India',
    'tag'           => 'City Guide',
    'date'          => 'Jul 09, 2026',
    'read_time'     => '12 min read',
  ],

  [
    'slug'          => '/blog/gym-after-hair-transplant',
    'category_slug' => 'recovery-and-aftercare',
    'title'         => 'Gym After Hair Transplant: When Can You Exercise and What to Avoid',
    'desc'          => 'Week-by-week exercise timeline after a hair transplant &mdash; from day 4 walking to full gym clearance. Includes specific guidance for yoga, cricket, heavy lifting and Indian summer heat.',
    'img'           => '/assets/images/blog/gym-after-hair-transplant.webp',
    'alt'           => 'Man at gym touching scalp after hair transplant recovery',
    'tag'           => 'Recovery &amp; Aftercare',
    'date'          => 'Jun 20, 2026',
    'read_time'     => '9 min read',
  ],
  
    [
    'slug'          => '/blog/shock-loss-after-hair-transplant',
    'category_slug' => 'recovery-and-aftercare',
    'title'         => 'Why Your Hair Falls Out After a Transplant: The Shock Loss Phase Explained',
    'desc'          => 'Post-transplant shedding is normal. Understand why shock loss happens, what the month-by-month timeline looks like, and how aftercare reduces it.',
    'img'           => '/assets/images/blog/shock-loss-hair-transplant.png',
    'alt'           => 'Scalp showing temporary hair shedding after hair transplant surgery',
    'tag'           => 'Recovery &amp; Aftercare',
    'date'          => 'Jun 17, 2026',
    'read_time'     => '10 min read',
  ],

]; // end $iht_posts
/* ============================================================
   HELPER FUNCTIONS — used by index.php and blog-category.php
   ============================================================ */

/**
 * Get posts for a specific category
 */
if (! function_exists('iht_posts_by_category')) {
function iht_posts_by_category(string $cat_slug, array $posts): array {
  return array_values(array_filter($posts, fn($p) => $p['category_slug'] === $cat_slug));
}
}

/**
 * Get the N most recent posts across all categories
 */
if (! function_exists('iht_latest_posts')) {
function iht_latest_posts(array $posts, int $limit = 8): array {
  $sorted = $posts;
  usort($sorted, fn($a, $b) => strtotime($b['date']) - strtotime($a['date']));
  return array_slice($sorted, 0, $limit);
}
}

/**
 * Render a blog card HTML string
 */
if (! function_exists('iht_render_card')) {
function iht_render_card(array $p, string $extra_class = ''): string {
  $dt = htmlspecialchars(
    strtolower(strip_tags($p['title']) . ' ' . $p['tag'] . ' ' . $p['category_slug']),
    ENT_QUOTES
  );
  $href  = htmlspecialchars(base_url(ltrim($p['slug'], '/')), ENT_QUOTES);
  $img   = htmlspecialchars(base_url(ltrim($p['img'], '/')), ENT_QUOTES);
  $alt   = htmlspecialchars($p['alt'], ENT_QUOTES);
  $class = $extra_class ? ' ' . $extra_class : '';
  return '
      <article class="blog-card' . $class . '" data-title="' . $dt . '">
        <a class="card-thumb" href="' . $href . '">
          <img loading="lazy" width="640" height="400" src="' . $img . '" alt="' . $alt . '" />
          <span class="card-tag">' . $p['tag'] . '</span>
        </a>
        <div class="card-body">
          <h3><a href="' . $href . '">' . $p['title'] . '</a></h3>
          <p class="card-meta"><span>' . $p['read_time'] . '</span><span>&bull;</span><span>' . $p['date'] . '</span></p>
          <p class="card-desc">' . $p['desc'] . '</p>
        </div>
      </article>';
}
}
