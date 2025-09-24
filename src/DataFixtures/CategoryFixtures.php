<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\CategoryData;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const string CATEGORY_REFERENCE = 'category';

    public function load(ObjectManager $manager): void
    {
        $categories = CategoryData::getCategories();

        foreach ($categories as $categoryData) {
            $category = $this->createCategory(
                $categoryData['name'],
                $categoryData['color'],
                $categoryData['icon'],
                $categoryData['position']
            );
            foreach ($categoryData['children'] as $childData) {
                $child = $this->createCategory(
                    $childData['name'],
                    $childData['color'],
                    $childData['icon'],
                    $childData['position'],
                    $category
                );
                $manager->persist($child);
                $this->setReference(self::CATEGORY_REFERENCE . '_' . $child->getSlug(), $child);
            }
            $manager->persist($category);
            $this->setReference(self::CATEGORY_REFERENCE . '_' . $category->getSlug(), $category);
        }

        $manager->flush();
    }

    private function createCategory(
        string $name,
        string $color,
        string $icon,
        int $position,
        ?Category $parent = null
    ): Category {
        $category = new Category();
        $category->setName($name)
            ->setColor($color)
            ->setIcon($icon)
            ->setPosition($position);

        if ($parent) {
            $category->setParent($parent);
        }

        return $category;
    }
}
