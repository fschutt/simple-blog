<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewBlogEntryController extends AbstractController
{
    public function html()
    {
        return $this->render('neuer-eintrag.html.twig', [

        ]);
    }
}