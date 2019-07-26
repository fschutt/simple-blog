<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogEntryController extends AbstractController
{
    public function html($slug)
    {
        return $this->render('blogeintrag.html.twig', [
            'controller_name' => 'BlogEntryController',
            'slug' => $slug,
        ]);
    }
}
