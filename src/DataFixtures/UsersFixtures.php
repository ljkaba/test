<?php

namespace App\DataFixtures;


namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UsersFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
   
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create('fr_FR');


        $users = Array();
           for ($i = 0; $i < 40; $i++) {
            $users[$i] = new Users();
            $users[$i]->setEmail($faker->email);
            if($i=== 1)
                $users[$i]->setRoles(["ROLE_ADMIN"]);
            else
            $users[$i]->setRoles(["ROLE_USER"]);
            $users[$i]->setLastName($faker->lastName);
            $users[$i]->setFirstName($faker->firstName);
            $users[$i]->setUserName($faker->userName);
            $users[$i]->setPassword($this->passwordEncoder->encodePassword($users[$i],"wick"));
           
            $manager->persist($users[$i]);

        $manager->flush();
    }
}
}
