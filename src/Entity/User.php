<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, EquatableInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Your username must be at least {{ limit }} characters long",
     *      maxMessage = "Your username cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string", length=50)
     */
    private $username;

    /**
     * @var string
     * @Assert\Email()
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Your email must be at least {{ limit }} characters long",
     *      maxMessage = "Your email name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=4096)
     */
    private $password;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=4096)
     */
    private $salt;

    /**
     * @var array
     * @Assert\NotNull()
     * @ORM\Column(type="json", length=4096)
     */
    private $roles;

    public function __construct(string $username, string $email, string $password, string $salt, array $roles)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Necessary for Interface "UserInterface"
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEMail(): ?string
    {
        return $this->email;
    }

    public function setEMail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    // Necessary for Interface "UserInterface"
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    // Necessary for Interface "UserInterface"
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    // Necessary for Interface "UserInterface"
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    // Necessary for Interface "UserInterface"
    public function eraseCredentials()
    {
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof User) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}
