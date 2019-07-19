<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    public function html()
    {
        return $this->render('registrieren.html.twig', [

        ]);
    }
}