<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegisterController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->render('registrieren.html.twig', [
                'registrationForm' => $form->createView(),
                'errors' => $form->getErrors(),
            ]);
        }

        $password = $form->get('password')->getData();
        $username = $form->get('username')->getData();
        $email = $form->get('email')->getData();

        $salt = base64_encode(random_bytes(50));
        $roles = ['ROLE_ADMIN']; // TODO: Change to ROLE_USER

        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setSalt($salt);
        $user->setRoles($roles);
        $user->setPassword($passwordEncoder->encodePassword($user, $password));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        // do anything else you need here, like send an email

        return $guardHandler->authenticateUserAndHandleSuccess(
            $user,
            $request,
            $authenticator,
            'main' // firewall name in security.yaml
        );
    }
}
