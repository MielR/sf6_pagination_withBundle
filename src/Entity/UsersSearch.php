<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as assert;

// creer une class UsersSearch;
// creer des variables private pour le form de recherche
// comment les @vars
// creer des getter et setter pour receuil des infos sur la form
// les setters sont forcement definies donc on enleve les "?" dans les setters
//*** on creer la form "UsersSearchType.php  ****


class UsersSearch
{
    /**
     * @var int|null
     * @assert\Range(max=99999)
     */
    private $zipcode ;

    /**
     * @var string|null
     */

    private $city ;


    /**
     * @return int|null
     */
    public function getzipcode(): ?int
    {
        return $this->zipcode;
    }

    /**
     * @param int|null $zipcode
     * @return UsersSearch
     */
    public function setzipcode( ?int $zipcode): UsersSearch
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getcity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return UsersSearch
     */
    public function setcity( ?string $city): UsersSearch
    {
        $this->city = $city;
        return $this;
    }

//    public function __toString()
//    {
//
//        return $this->designation;
//    }


}