<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2, Length:50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min:2, Length:50)]
    private ?string $lastname = null;   
    

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $number = null;

    #[ORM\Column(length: 50)]
    #[Assert\Email()]
    private ?string $email = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $role = null;

    /**
     * @var Collection<int, Events>
     */
    #[ORM\ManyToMany(targetEntity: Events::class, mappedBy: 'User')]
    private Collection $users_events;

    public function __construct()
    {
        $this->users_events = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Events>
     */
    public function getUsersEvents(): Collection
    {
        return $this->users_events;
    }

    public function addUsersEvent(Events $usersEvent): static
    {
        if (!$this->users_events->contains($usersEvent)) {
            $this->users_events->add($usersEvent);
            $usersEvent->addUser($this);
        }

        return $this;
    }

    public function removeUsersEvent(Events $usersEvent): static
    {
        if ($this->users_events->removeElement($usersEvent)) {
            $usersEvent->removeUser($this);
        }

        return $this;
    }

}