<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\ItemData;
use App\Entity\Category;
use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Enum\ItemStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    public const string ITEM_REFERENCE = 'item';

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

            if ($itemData['variants']) {
                foreach ($itemData['variants'] as $key => $variantData) {
                    $variant = new ItemVariant();
                    $variant->setName($variantData['name'])
                        ->setSku($variantData['sku'] ?? null)
                        ->setWeight($variantData['weight'] ?? null)
                        ->setPrice($variantData['price'] ?? null)
                        ->setSpecifications($variantData['specifications'] ?? null)
                        ->setIsDefault($key == 0);

                    $variant->setItem($item);
                    $manager->persist($variant);
                    $this->setReference(self::ITEM_REFERENCE . '_' . $variant->getSku(), $variant);
                }
            } else {
                $variant = new ItemVariant();
                $variant->setName('Default');
                $variant->setItem($item);
                $manager->persist($variant);
            }


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
