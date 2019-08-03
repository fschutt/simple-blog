<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewBlogEntryController extends AbstractController
{
    public function html()
    {
        /*

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form = $this->createFormBuilder()
        ->add('phone', 'text', array('attr' => array('autofocus' => '')))
        ->add('period', 'number', array('attr' => array('value' => '12')))
        ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            // data is an array with "phone" and "period" keys
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $contract = $em->getRepository('FrontBundle:Contract')->getContractByPhone($data["phone"]);
            $contract->setOwner("John Doe");
            $contract->setPhone($data["phone"]);

            // or this could be $contract = new Contract("John Doe", $data["phone"], $data["period"]);


            $em->persist($contract);
        }

        */
        return $this->render('neuer-eintrag.html.twig', [

        ]);
    }
}