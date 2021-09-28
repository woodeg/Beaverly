<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface  $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function load(ObjectManager $manager)
    {
        $product = new User();
        $product->setUsername('admin');
        $product->setPassword($this->hasher->hashPassword($product, '333'));
        $product->setFirstName('John');
        $product->setLastName('Doe');
        $product->setIsActive(true);
        $product->setRoles(['ROLE_ADMIN']);
        $product->setUserDescription('Test User/Administrator from Fixtures');

        $manager->persist($product);

        $manager->flush();
    }
}
