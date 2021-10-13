<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Group;
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
        $group = new Group();
        $group->setGroupName('Admins');
        $group->setIsActive(true);

        $manager->persist($group);
        $manager->flush();


        $contact = new Contact;
        $contact->setCountry('Germany');
        $contact->setRegion('SH');
        $contact->setCity('Neumünster');
        $contact->setPostCode('24534');
        $contact->setStreet('Haart');
        $contact->setHouse('45');
        $contact->setEmail('e-mail@e-mail.com');
        $contact->setWebpage('www.www.com');
        $contact->setDescription('Some test text here');

        $manager->persist($contact);
        $manager->flush();


        $product = new User();
        $product->setUsername('admin');
        $product->setPassword($this->hasher->hashPassword($product, '333'));
        $product->setFirstName('John');
        $product->setLastName('Doe');
        $product->setIsActive(true);
        $product->setRoles(['ROLE_ADMIN']);
        $product->setUserDescription('Test User/Administrator from Fixtures');
        $product->setGroups($group);

        $manager->persist($product);
        $manager->flush();

        
    }
}
