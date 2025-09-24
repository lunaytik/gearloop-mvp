<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Entity\Kit;
use App\Entity\KitItem;
use App\Entity\User;
use App\Enum\ActivityType;
use App\Enum\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class KitFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $kit = new Kit();
        $kit->setName('Sac Cantal')
            ->setActivityType(ActivityType::DAY_HIKE)
            ->setSeason(Season::SUMMER)
            ->setIsPublic(true)
            ->setOwner($this->getReference(UserFixtures::USER_REFERENCE . '_' . 'admin_test', User::class));

        $kitItem = new KitItem();
        $kitItem->setVariant($this->getReference(ItemFixtures::ITEM_REFERENCE . '_' . '1', ItemVariant::class))
            ->setQuantity(2)
            ->setPersonalNotes('TEST POUR VOIR')
            ->setKit($kit);

        $manager->persist($kitItem);
        $manager->persist($kit);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            ItemFixtures::class,
        ];
    }
}
