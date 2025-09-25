<?php

namespace App\EventListener;

use App\Entity\Category;
use App\Entity\Kit;
use App\Repository\KitRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Category::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Category::class)]
#[AsEntityListener(event: Events::prePersist, method: 'prePersistKit', entity: Kit::class)]
final class SlugGeneratorListener
{
    public function __construct(private SluggerInterface $slugger, private KitRepository $kitRepository)
    {
    }

    public function prePersist(Category $category, PrePersistEventArgs $args): void
    {
        $slug = $this->slugger->slug($category->getName())->lower()->toString();
        $category->setSlug($slug);
    }

    public function preUpdate(Category $category, PreUpdateEventArgs $args): void
    {
        if ($args->hasChangedField('name')) {
            $slug = $this->slugger->slug($category->getName())->lower()->toString();
            $category->setSlug($slug);
        }
    }

    public function prePersistKit(Kit $kit, PrePersistEventArgs $args): void
    {
        $slugExist = $this->kitRepository->findOneBy(['slug' => $kit->getSlug()]);

        // TODO:: CHANGE FOR REWRITE WITH 1, 2...
        if ($slugExist) {
            $slug = $this->slugger->slug($kit->getName())->lower()->toString();
            $slug .= '-' . $kit->getId();
            $kit->setSlug($slug);
        } else {
            $slug = $this->slugger->slug($kit->getName())->lower()->toString();
            $kit->setSlug($slug);
        }

    }
}
