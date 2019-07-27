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
                'body' => 'In computer science, a k-d tree (short for k-dimensional tree) is a space-partitioning data structure for organizing points in a k-dimensional space. k-d trees are a useful data structure for several applications, such as searches involving a multidimensional search key (e.g. range searches and nearest neighbor searches). k-d trees are a special case of binary space partitioning trees.',
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