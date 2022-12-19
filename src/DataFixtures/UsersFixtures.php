<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=1; $i<=100 ; $i++){
            $users = new Users();
            $users->setfirstname($faker->firstName);
            $users->setlastname($faker->lastName);
            $users->setemail($faker->email);
            $users->setadress($faker->streetAddress);
            $users->setzipcode($faker->postcode);
            $users->setcity($faker->city);
        $manager->persist($users);
        }

        $manager->flush();
    }
}
