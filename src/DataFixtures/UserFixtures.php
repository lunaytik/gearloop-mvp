<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\UserData;
use App\Entity\User;
use App\Enum\ExperienceLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $users = UserData::getUsers();

        foreach ($users as $userData) {
            $user = new User();

            $password = $this->passwordHasher->hashPassword($user, 'test1234');

            $user->setEmail($userData['email'])
                ->setPassword($password)
                ->setUsername($userData['username'])
                ->setDisplayName($userData['displayName'] ?? $userData['username'])
                ->setExperienceLevel(ExperienceLevel::from($userData['experienceLevel']))
                ->setRoles($userData['roles'] ?? [])
                ->setBio($userData['bio'] ?? null)
                ->setLocation($userData['location'] ?? null)
                ->setAvatar($userData['avatar'] ?? null);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
