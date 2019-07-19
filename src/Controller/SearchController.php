<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    public function html($search)
    {
        // TODO: Very unsafe!
        return $this->render('suche.html.twig', [
            'search' => $search
        ]);
    }
}