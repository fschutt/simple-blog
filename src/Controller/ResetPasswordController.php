<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ResetPasswordController extends AbstractController
{
    public function html()
    {
        return $this->render('passwort-vergessen.html.twig', [

        ]);
    }
}