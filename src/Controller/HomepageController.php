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
                'link' => '2019-07-25/hallo-welt-1',
                'body' => 'Lorem ipsum dolor sit amet',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'link' => '2019-07-25/hallo-welt-2',
                'body' => 'Lorem ipsum dolor sit amet',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'link' => '2019-07-25/hallo-welt-3',
                'body' => 'Lorem ipsum dolor sit amet',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'link' => '2019-06/hallo-welt-4',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'link' => '2019-07-25/hallo-welt-5',
                'body' => 'Body',
            ],
            (object)[
                'title' => 'Hallo Welt!',
                'link' => '2019-07-25/hallo-welt-6',
                'body' => 'Body',
            ],
        ];

        return $this->render('startseite.html.twig', [
            'blog_entries' => $blog_entries,
        ]);
    }
}