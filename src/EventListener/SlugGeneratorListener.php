<?php

namespace App\EventListener;

use App\Entity\Category;
use App\Entity\Kit;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Uid\Ulid;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Category::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Category::class)]
#[AsEntityListener(event: Events::prePersist, method: 'prePersistKit', entity: Kit::class)]
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

    public function prePersistKit(Kit $kit, PrePersistEventArgs $args): void
    {
        $ulid = new Ulid();
        $shortUid = substr($ulid->toBase32(), 0, 8);

        $slug = $this->slugger->slug($kit->getName() . '-' . $shortUid)->lower()->toString();
        $kit->setSlug($slug);
    }
}
