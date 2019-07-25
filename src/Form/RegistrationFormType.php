<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\IsTrue;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'mapped' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a username',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        'max' => 50,
                        'maxMessage' => 'Your username cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'mapped' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a valid email',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        'max' => 255,
                        'maxMessage' => 'Your username cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('password', PasswordType::class, [
                'mapped' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 255,
                        'maxMessage' => 'Your password cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
