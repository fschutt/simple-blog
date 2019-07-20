<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Create the admin account
        $username = 'admin';
        $email = 'hello@hello.com';
        $password = 'foo';
        $salt = 'salt'; // ????
        $roles = ['admin'];
        $user = new User($username, $email, $password, $salt, $roles);

        $manager->persist($user);
        $manager->flush();
    }
}
