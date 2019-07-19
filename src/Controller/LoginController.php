<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoginController extends AbstractController
{
    public function html()
    {
        return $this->render('anmelden.html.twig', [

        ]);
    }
}