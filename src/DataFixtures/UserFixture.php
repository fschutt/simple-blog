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
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword($this->encoder->encodePassword($user, 'foo'));
        $user->setIsAdmin(true);
        $manager->persist($product);

        $manager->flush();
    }
}
