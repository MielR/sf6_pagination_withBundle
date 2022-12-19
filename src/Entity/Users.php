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
    private ?int $id = null ;

    #[ORM\Column(length: 100)]
    private ?string $firstname ;

    #[ORM\Column(length: 100)]
    private ?string $lastname ;

    #[ORM\Column(type: Types::STRING, unique: true)]
    private ?string $email ;

    #[ORM\Column(length: 100)]
    private ?string $adress ;

    #[ORM\Column(length: 5)]
    private ?string $zipcode ;

    #[ORM\Column(length: 100)]
    private ?string $city ;

    #[ORM\Column(options: ['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt ;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getfirstname(): ?string
    {
        return $this->firstname;
    }

    public function setfirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getlastname(): ?string
    {
        return $this->lastname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setlastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getadress(): ?string
    {
        return $this->adress;
    }

    public function setadress(string $adress): self
    {
        $this->Adress = $adress;

        return $this;
    }

    public function getzipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setzipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getcity(): ?string
    {
        return $this->city;
    }

    public function setcity(string $city): self
    {
        $this->$city = $city;

        return $this;
    }

//    public function getUserIdentifier(): string
//    {
//        // TODO: Implement getUserIdentifier() method.
//    }
//
//    public function getcreatedAt(): ?\DateTimeImmutable
//    {
//        return $this->createdAt;
//    }
//
//    public function setcreatedAt(\DateTimeImmutable $createdAt): self
//    {
//        $this->createdAt = $createdAt;
//
//        return $this;
//    }

}
