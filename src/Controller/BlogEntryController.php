<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogEntryController extends AbstractController
{
    public function html($slug)
    {
        // TODO: lookup $slug in blogposts
        // if not found, redirect to 404 page
        // if found
        return $this->render('blogeintrag.html.twig', [
            'controller_name' => 'BlogEntryController',
            'slug' => $slug,
        ]);
    }
}
