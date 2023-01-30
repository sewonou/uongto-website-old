<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\MenuCategory;
use App\Entity\PageCategory;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $role1 = new Role();
        $role2 = new  Role();
        $role1->setTitle('ROLE_ADMIN');
        $manager->persist($role1);
        $role2->setTitle('ROLE_USER');
        $manager->persist($role2);
        $manager->persist($role2);

        $user->setUsername("sewonou")
            ->setPassword($this->encoder->hashPassword( $user, 'password'))
            ->addUserRole($role1)
            ->addUserRole($role2);

        $manager->persist($user);

        $pageCategories = [];
        $pages = [];
        $menuCategories = ['header', 'footer'];
        $menuHeader = [];
        $menuFooter = [];


        $manager->flush();
    }
}
