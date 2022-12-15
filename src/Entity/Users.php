<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Firtname = null;

    #[ORM\Column(length: 100)]
    private ?string $Lastname = null;

    #[ORM\Column(type: Types::STRING, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    private ?string $Adress = null;

    #[ORM\Column(length: 5)]
    private ?string $Zipcode = null;

    #[ORM\Column(length: 100)]
    private ?string $City = null;

    #[ORM\Column(options: ['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirtname(): ?string
    {
        return $this->Firtname;
    }

    public function setFirtname(string $Firtname): self
    {
        $this->Firtname = $Firtname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): self
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->Zipcode;
    }

    public function setZipcode(string $Zipcode): self
    {
        $this->Zipcode = $Zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        // TODO: Implement getUserIdentifier() method.
    }

    public function getcreated_at(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setcreated_at(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

}
