<?php
/**
 * Cover/banner consultation CTA — opens site-wide popup-form modal.
 * Usage: <?= $this->include('partials/hero-consult-cta') ?>
 */
$ctaLabel = $ctaLabel ?? 'Book Your Consultation';
?>
<div class="hero-cta page-hero-cta">
  <a class="hero-btn" href="#" data-popup="consult" role="button"><?= esc($ctaLabel) ?></a>
</div>
