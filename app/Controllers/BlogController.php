<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class BlogController extends BaseController
{
    public function index(): string
    {
        [$categories, $posts] = $this->blogData();

        return view('blog/index', [
            'iht_categories' => $categories,
            'iht_posts'      => $posts,
        ]);
    }

    public function resolve(string $slug): string
    {
        $slug = trim($slug, '/');

        if ($slug === '' || str_contains($slug, '..') || str_contains($slug, '\\')) {
            throw PageNotFoundException::forPageNotFound();
        }

        [$categories, $posts] = $this->blogData();

        if (isset($categories[$slug])) {
            return view('blog/category', [
                'slug'           => $slug,
                'iht_categories' => $categories,
                'iht_posts'      => $posts,
            ]);
        }

        foreach ($posts as $post) {
            $postSlug = trim((string) preg_replace('#^/blog/#', '', (string) $post['slug']), '/');
            if ($postSlug === $slug) {
                $view = 'blog/posts/' . $slug;
                if (! is_file(APPPATH . 'Views/' . $view . '.php')) {
                    throw PageNotFoundException::forPageNotFound($slug);
                }

                return view($view);
            }
        }

        throw PageNotFoundException::forPageNotFound($slug);
    }

    public function sitemap()
    {
        return $this->response
            ->setContentType('application/xml')
            ->setBody(view('blog/sitemap_xml', [
                'iht_categories' => $this->blogData()[0],
                'iht_posts'      => $this->blogData()[1],
            ]));
    }

    private function blogData(): array
    {
        require APPPATH . 'Views/blog/_data.php';

        return [$iht_categories ?? [], $iht_posts ?? []];
    }
}
