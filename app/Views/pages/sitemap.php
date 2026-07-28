<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<?php
/**
 * html-sitemap.php
 * Automatically fetches from XML and categorizes pages based on medical keywords.
 */

$LOCAL_SITEMAP_PATH = __DIR__ . '/sitemap.xml';
$LIVE_SITEMAP_URL   = 'https://indiahairtransplant.com/sitemap.xml';

$xml = null;
if (file_exists($LOCAL_SITEMAP_PATH)) {
    $xml = @simplexml_load_file($LOCAL_SITEMAP_PATH);
}
if (!$xml) {
    $xml = @simplexml_load_file($LIVE_SITEMAP_URL);
}

$urls = [];
if ($xml && isset($xml->url)) {
    foreach ($xml->url as $u) {
        $loc = trim((string)$u->loc);
        if (!$loc || $loc === '#' || stripos($loc, 'http') !== 0) continue;
        $urls[] = rtrim($loc, '/');
    }
}

$urls = array_values(array_unique($urls));
sort($urls);

/**
 * Generates a clean label from the URL slug
 */
function label_from_url($url) {
    $path = parse_url($url, PHP_URL_PATH) ?? '/';
    $path = trim($path, '/');
    if ($path === '') return 'Home';

    if (strpos($path, 'hair-transplant-in-') === 0) {
        $city = str_replace('hair-transplant-in-', '', $path);
        $city = ucwords(str_replace('-', ' ', $city));
        return "Hair Transplant in {$city}";
    }

    $label = ucwords(str_replace('-', ' ', $path));
    $label = str_replace(['Faqs', 'Prp', 'Fue', 'Fut', 'Gfc', 'Lllt'], ['FAQs', 'PRP', 'FUE', 'FUT', 'GFC', 'LLLT'], $label);

    return $label;
}

// 1. Define Groups in the logical display order
$groups = [
    "Hair Loss Types"      => [], // Alopecia, Effluvium
    "Scalp Conditions"     => [], // Dandruff, Psoriasis, Dermatitis
    "Hair Loss Treatments" => [], // PRP, GFC, Meds
    "Our Techniques"       => [], // FUE, FUT
    "HT Cost & Planning"   => [], // Cost, FAQs
    "Hair Transplant"      => [], // Main HT, Beard, Moustache
    "About"                => [],
    "Others"               => [], 
];

$cityPages = [];

foreach ($urls as $loc) {
    $path = parse_url($loc, PHP_URL_PATH) ?? '/';
    $path = rtrim($path, '/'); 

    // Category: Clinic/City Pages
    if (strpos($path, '/hair-transplant-in-') === 0) {
        $cityPages[] = $loc;
        continue;
    }

    // Category: Fixed Logic for Navigation
    if ($path === '/contact-us') { $groups["About"][] = $loc; continue; }
    if (in_array($path, ['/about-us', '/privacy-policy', '/terms-and-conditions', '/disclaimer'])) { 
        $groups["About"][] = $loc; 
        continue; 
    }
    if (in_array($path, ['/hair-transplant-cost', '/faqs', '/hair-transplant-safety-and-recovery'])) { 
        $groups["HT Cost & Planning"][] = $loc; 
        continue; 
    }
    if (in_array($path, ['/fue-hair-transplant', '/fut-hair-transplant', '/unshaven-hair-transplant'])) { 
        $groups["Our Techniques"][] = $loc; 
        continue; 
    }

    // Category: Hair Loss Types (Alopecia, Effluvium)
    if (preg_match('/(alopecia|effluvium)/i', $path)) {
        $groups["Hair Loss Types"][] = $loc;
        continue;
    }

    // Category: Scalp Conditions (Dandruff, Psoriasis, Dermatitis, Folliculitis)
    if (preg_match('/(dandruff|psoriasis|dermatitis|folliculitis)/i', $path)) {
        $groups["Scalp Conditions"][] = $loc;
        continue;
    }

    // Category: Hair Loss Treatments (PRP, GFC, etc)
    if (preg_match('/(prp|gfc|therapy|lllt|minoxidil|treatment)/i', $path)) {
        $groups["Hair Loss Treatments"][] = $loc;
        continue;
    }

    // Category: Hair Transplant (Generic + Facial HT)
    if (stripos($path, 'transplant') !== false) {
        $groups["Hair Transplant"][] = $loc;
        continue;
    }

    // Category: Others (Catch-all for everything else)
    if ($path !== '' && $path !== '/') {
        $groups["Others"][] = $loc;
    }
}

// Clean up
foreach ($groups as $k => $arr) { $groups[$k] = array_values(array_unique($arr)); }
$cityPages = array_values(array_unique($cityPages));
sort($cityPages);
?>

<section class="iht-sitemap-v3">
  <div class="sitemap-container">

    <div class="sitemap-header">
        <h1>Sitemap</h1>
        <div class="accent-bar"></div>
        <p>Comprehensive index of hair restoration information and clinic locations.</p>
    </div>

    <div class="sitemap-main-grid">
        <?php foreach ($groups as $title => $list): if (empty($list)) continue; ?>
            <div class="sitemap-column">
                <h3 class="column-title"><?php echo htmlspecialchars($title); ?></h3>
                <ul class="link-list">
                    <?php foreach ($list as $u): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($u); ?>">
                                <?php echo htmlspecialchars(label_from_url($u)); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (!empty($cityPages)): ?>
    <div class="city-section">
        <h2 class="city-section-title">Our Clinic Locations</h2>
        <ul class="city-grid">
            <?php foreach ($cityPages as $u): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($u); ?>">
                        <svg class="loc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <?php echo htmlspecialchars(label_from_url($u)); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

  </div>
</section>

<style>
:root { --brand-orange: #f47a1f; --text-dark: #222; --text-muted: #555; }

.iht-sitemap-v3 { background: #ffffff; padding: 60px 0; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
.iht-sitemap-v3 .sitemap-container { max-width: 1240px; margin: 0 auto; padding: 0 20px; }

/* Header */
.sitemap-header { text-align: center; margin-bottom: 50px; }
.sitemap-header h1 { font-size: 36px; font-weight: 800; color: #111; margin-bottom: 8px; text-transform: uppercase; }
.sitemap-header .accent-bar { width: 50px; height: 4px; background: var(--brand-orange); margin: 0 auto 15px; }
.sitemap-header p { color: var(--text-muted); font-size: 17px; }

/* Dynamic Grid */
.sitemap-main-grid { 
    display: grid; 
    grid-template-columns: repeat(4, 1fr); 
    gap: 40px 25px; 
}

.column-title { 
    font-size: 18px; font-weight: 700; color: #111; margin-bottom: 20px; 
    padding-bottom: 8px; border-bottom: 1px solid #f0f0f0; position: relative;
}
.column-title::after {
    content: ''; position: absolute; left: 0; bottom: -1px; width: 35px; height: 3px; background: var(--brand-orange);
}

.link-list { list-style: none; padding: 0; margin: 0; }
.link-list li { margin-bottom: 10px; }
.link-list a { 
    text-decoration: none; color: var(--text-muted); font-size: 14.5px; 
    transition: 0.2s ease; display: inline-block; line-height: 1.4;
}
.link-list a:hover { color: var(--brand-orange); transform: translateX(4px); }

/* City Cards */
.city-section { margin-top: 60px; padding: 40px; background: #fafafa; border-radius: 15px; border: 1px solid #eee; }
.city-section-title { font-size: 24px; font-weight: 700; color: #111; margin-bottom: 30px; text-align: center; }

.city-grid { list-style: none; padding: 0; margin: 0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; }
.city-grid a { 
    display: flex; align-items: center; text-decoration: none; color: #444; 
    font-size: 13.5px; padding: 12px; background: #fff; border-radius: 8px; 
    border: 1px solid #ddd; transition: 0.3s;
}
.loc-icon { width: 14px; height: 14px; margin-right: 8px; color: var(--brand-orange); flex-shrink: 0; }
.city-grid a:hover { 
    border-color: var(--brand-orange); color: var(--brand-orange); 
    box-shadow: 0 5px 15px rgba(0,0,0,0.05); transform: translateY(-2px);
}

/* Responsive Breakpoints */
@media(max-width: 1024px) { .sitemap-main-grid { grid-template-columns: repeat(3, 1fr); } }
@media(max-width: 768px) { 
    .sitemap-main-grid { grid-template-columns: repeat(2, 1fr); }
    .city-grid { grid-template-columns: repeat(2, 1fr); }
}
@media(max-width: 480px) { 
    .sitemap-main-grid { grid-template-columns: 1fr; } 
    .city-grid { grid-template-columns: 1fr; }
    .sitemap-header h1 { font-size: 28px; }
}
</style>

<?= $this->endSection() ?>
