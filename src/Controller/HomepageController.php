<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    public function html()
    {
        $blog_entries = [
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'body' => 'Body',
            ],
        ];

        return $this->render('startseite.html.twig', [
            'blog_entries' => $blog_entries,
        ]);
    }
}