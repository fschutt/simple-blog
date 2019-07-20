<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Util\SecureRandom;

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
        $random = new SecureRandom();
        $salt = base64_encode($random->nextBytes(128 / 8)); // ????

        $username = 'admin';
        $email = 'hello@hello.com';
        $roles = ['ROLE_ADMIN'];

        $user = new User($username, $email, '', $salt, $roles);
        $user->setPassword($this->encoder->encodePassword($user, 'foo'));

        $manager->persist($user);
        $manager->flush();
    }
}
