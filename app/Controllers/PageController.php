<?php

namespace App\Controllers;

class PageController extends BaseController
{
    /**
     * Serve a static content page from app/Views/pages/{slug}.php
     */
    public function show(string $slug = ''): string
    {
        $slug = trim($slug, '/');

        // Prevent path traversal
        if ($slug === '' || str_contains($slug, '..') || str_contains($slug, '\\')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $view = 'pages/' . $slug;

        if (! is_file(APPPATH . 'Views/' . $view . '.php')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound($slug);
        }

        $bodyClasses = [
            'contact-us' => 'page-contact',
        ];

        return view($view, [
            'bodyClass' => $bodyClasses[$slug] ?? '',
        ]);
    }
}
