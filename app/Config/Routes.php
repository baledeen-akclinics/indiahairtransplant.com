<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'HomeController::index');

// Lead form endpoint (legacy: /form-handler.php)
$routes->post('form-handler', 'FormController::handle');
$routes->options('form-handler', 'FormController::handle');
// YouTube → WhatsApp click redirect + WATI webhook
$routes->get('whatsapp', 'WhatsAppController::redirect');
$routes->get('whatsapp/webhook', 'WhatsAppController::webhookVerify');
$routes->post('whatsapp/webhook', 'WhatsAppController::webhook');

$routes->get('procedure-categories', 'ContactController::procedureCategories');
$routes->post('contact-submit', 'ContactController::submit');
$routes->get('blog', 'BlogController::index');
$routes->get('blog/', 'BlogController::index');
$routes->get('blog-sitemap.xml', 'BlogController::sitemap');
$routes->get('blog/(:segment)', 'BlogController::resolve/$1');
$routes->get('blog/(:segment)/', 'BlogController::resolve/$1');

// All converted content pages (slug => app/Views/pages/{slug}.php)
$pages = [
    'about-us',
    'alopecia-areata',
    'anagen-effluvium',
    'androgenetic-alopecia',
    'beard-transplant',
    'body-hair-transplant',
    'causes-of-hair-loss',
    'cicatricial-alopecia',
    'contact-us',
    'dandruff',
    'dr-aman-dua',
    'dr-kapil-dua',
    'eyebrow-hair-transplant',
    'faqs',
    'female-hair-transplant',
    'fue-hair-transplant',
    'fut-hair-transplant',
    'gfc-hair-treatment',
    'hair-loss',
    'hair-loss-assessment',
    'hair-loss-in-men',
    'hair-loss-in-women',
    'hair-transplant',
    'hair-transplant-cost',
    'hair-transplant-cost-calculator',
    'hair-transplant-in-agra',
    'hair-transplant-in-amritsar',
    'hair-transplant-in-bangalore',
    'hair-transplant-in-bathinda',
    'hair-transplant-in-chandigarh',
    'hair-transplant-in-delhi',
    'hair-transplant-in-fazilka',
    'hair-transplant-in-gurgaon',
    'hair-transplant-in-hanumangarh',
    'hair-transplant-in-jaipur',
    'hair-transplant-in-jalandhar',
    'hair-transplant-in-kota',
    'hair-transplant-in-ludhiana',
    'hair-transplant-in-meerut',
    'hair-transplant-in-mohali',
    'hair-transplant-in-morinda',
    'hair-transplant-in-noida',
    'hair-transplant-in-panchkula',
    'hair-transplant-in-patiala',
    'hair-transplant-in-shri-muktsar-sahib',
    'hair-transplant-in-sri-ganganagar',
    'hair-transplant-in-zirakpur',
    'hair-transplant-safety-and-recovery',
    'hair-transplant-side-effects',
    'low-level-laser-therapy',
    'male-hair-transplant',
    'minoxidil-for-hair-loss',
    'moustache-transplant',
    'privacy-policy',
    'prp-hair-treatment',
    'scalp-folliculitis',
    'scalp-psoriasis',
    'seborrheic-dermatitis',
    'sitemap',
    'telogen-effluvium',
    'terms-and-conditions',
    'traction-alopecia',
    'unshaven-hair-transplant',
];

foreach ($pages as $slug) {
    $routes->get($slug, 'PageController::show/' . $slug);
}
