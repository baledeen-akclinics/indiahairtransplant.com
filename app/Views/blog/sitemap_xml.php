<?php


$base = 'https://indiahairtransplant.com';

// Convert display date (e.g. "Jun 17, 2026") to W3C datetime (2026-06-17)
function iht_to_w3c(string $date): string {
    $ts = strtotime($date);
    return $ts ? date('Y-m-d', $ts) : date('Y-m-d');
}

header('Content-Type: application/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?= $base ?>/blog/</loc>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
  </url>
  <?php foreach ($iht_categories as $slug => $cat): ?>
  <url>
    <loc><?= $base ?>/blog/<?= $slug ?>/</loc>
    <changefreq>weekly</changefreq>
    <priority>0.7</priority>
  </url>
  <?php endforeach; ?>
  <?php foreach ($iht_posts as $post):
    // Slug may start with /blog/ or just / — normalise to full URL
    $raw  = ltrim($post['slug'], '/');
    $path = (strpos($raw, 'blog/') === 0) ? $raw : 'blog/' . $raw;
    $loc  = $base . '/' . $path;
    $mod  = iht_to_w3c($post['date']);
  ?>
  <url>
    <loc><?= htmlspecialchars($loc) ?></loc>
    <lastmod><?= $mod ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
  <?php endforeach; ?>

</urlset>
