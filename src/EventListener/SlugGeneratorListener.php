<?php

namespace App\EventListener;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Category::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Category::class)]
final class SlugGeneratorListener
{
    public function __construct(private SluggerInterface $slugger)
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
}
