<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogEntryListController extends AbstractController
{
    public function html()
    {
        return $this->render('blogeintraege-verwalten.html.twig', [

        ]);
    }
}