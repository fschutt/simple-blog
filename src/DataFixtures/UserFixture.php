<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
// use Symfony\Component\Security\Core\Util\SecureRandom;

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
        $user->setEmail('hello@hello.com');
        $user->setSalt(base64_encode(random_bytes(50)));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->encodePassword($user, 'foo'));

        $manager->persist($user);
        $manager->flush();
    }
}
