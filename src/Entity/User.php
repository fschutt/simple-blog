<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
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
     * @Assert\Length(
     *      min = 8,
     *      max = 50,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your password cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string", length=4096)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string", length=4096)
     */
    private $salt;

    /**
     * @var array
     * @ORM\Column(type="json", length=4096)
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogEntry", mappedBy="created_by", orphanRemoval=true)
     */
    private $blogEntries;

    public function __construct()
    {
        $this->blogEntries = new ArrayCollection();
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

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    // Necessary for Interface "UserInterface"
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    // Necessary for Interface "UserInterface"
    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!($user instanceof User)) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        // if ($this->password !== $user->getPassword()) {
        //     return false;
        // }

        // if ($this->salt !== $user->getSalt()) {
        //     return false;
        // }

        // if ($this->roles !== $user->getRoles()) {
        //     return false;
        // }

        return true;
    }

    /**
     * @return Collection|BlogEntry[]
     */
    public function getBlogEntries(): Collection
    {
        return $this->blogEntries;
    }

    public function addBlogEntry(BlogEntry $blogEntry): self
    {
        if (!$this->blogEntries->contains($blogEntry)) {
            $this->blogEntries[] = $blogEntry;
            $blogEntry->setCreatedBy($this);
        }

        return $this;
    }

    public function removeBlogEntry(BlogEntry $blogEntry): self
    {
        if ($this->blogEntries->contains($blogEntry)) {
            $this->blogEntries->removeElement($blogEntry);
            // set the owning side to null (unless already changed)
            if ($blogEntry->getCreatedBy() === $this) {
                $blogEntry->setCreatedBy(null);
            }
        }

        return $this;
    }
}
