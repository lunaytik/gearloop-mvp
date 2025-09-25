<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Entity\Kit;
use App\Entity\KitItem;
use App\Entity\User;
use App\Enum\ActivityType;
use App\Enum\Season;
use App\Service\KitStatsCalculator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class KitFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private KitStatsCalculator $calculator)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $kit = new Kit();
        $kit->setName('Sac Cantal')
            ->setActivityType(ActivityType::DAY_HIKE)
            ->setSeason(Season::SUMMER)
            ->setIsPublic(true)
            ->setOwner($this->getReference(UserFixtures::USER_REFERENCE . '_' . 'admin_test', User::class));

        $kitItem = new KitItem();
        $kitItem->setVariant($this->getReference(ItemFixtures::ITEM_REFERENCE . '_' . 'PA_HO_0001', ItemVariant::class))
            ->setQuantity(1)
            ->setPersonalNotes('Ultra lightweight wind shell because there is heavy wind announced');

        $kitItem2 = new KitItem();
        $kitItem2->setVariant($this->getReference(ItemFixtures::ITEM_REFERENCE . '_' . 'SM_BO_0001', ItemVariant::class))
            ->setQuantity(5)
            ->setPersonalNotes('Merino boxers for comfort');

        $kit->addKitItem($kitItem);
        $kit->addKitItem($kitItem2);

        $manager->persist($kit);
        $manager->flush();

        $this->calculator->calculateStats($kit);
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            ItemFixtures::class,
        ];
    }
}
