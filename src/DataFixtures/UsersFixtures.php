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
            $user = new Users();
            $user->setfirstname($faker->firstName);
            $user->setlastname($faker->lastName);
            $user->setemail($faker->email);
            $user->setadress($faker->streetAddress);
            $user->setZipcode(str_replace(' ', '', $faker->postcode));
            $user->setcity($faker->city);

        $manager->persist($user);
        }
        $manager->flush();
    }
}
