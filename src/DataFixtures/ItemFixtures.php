<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\ItemData;
use App\Entity\Category;
use App\Entity\Item;
use App\Enum\ItemStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $items = ItemData::getItems();

        foreach ($items as $itemData) {
            $item = new Item();
            $category = $this->getReference(CategoryFixtures::CATEGORY_REFERENCE . '_' . $itemData['categorySlug'], Category::class);

            $item->setName($itemData['name'])
                ->setBrand($itemData['brand'])
                ->setModel($itemData['model'])
                ->setDescription($itemData['description'])
                ->setStatus(ItemStatus::from($itemData['status']))
//                ->setImageUrl($itemData['imageUrl'] ?? null)
                ->setSpecifications($itemData['specifications'] ?? null)
                ->setCategory($category);

            $manager->persist($item);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
