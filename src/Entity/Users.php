<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: UsersRepository::class)]
 class Users
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer',unique:true)]
    private ?int $id ;

    #[ORM\Column(type: 'string', length: 100)]
    private ?string $firstname;

    #[ORM\Column(type: 'string', length: 100)]
    private ?string $lastname;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column(type: 'string', length: 100)]
    private ?string $adress;


    #[ORM\Column(type: 'string', length: 5)]
    private ?string $zipcode;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $city ;


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

    public function setlastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getadress(): ?string
    {
        return $this->adress;
    }

    public function setadress(string $adress): self
    {
        $this->adress = $adress;

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
        $this->city = $city;

        return $this;
    }

//    public function getUserIdentifier(): string
//    {
//        // TODO: Implement getUserIdentifier() method.
//    }


}
