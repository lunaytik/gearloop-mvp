<?php

namespace App\EventListener;

use App\Entity\Category;
use App\Entity\Kit;
use App\Entity\KitItem;
use App\Repository\KitRepository;
use App\Service\KitRecalculationQueue;
use App\Service\KitStatsCalculator;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreRemoveEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: KitItem::class)]
#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: KitItem::class)]
#[AsEntityListener(event: Events::preRemove, method: 'preRemove', entity: KitItem::class)]
final class KitItemListener
{
    public function __construct(private KitRecalculationQueue $queue)
    {
    }

    public function preUpdate(KitItem $kitItem, PreUpdateEventArgs $args): void
    {
        if ($args->hasChangedField('quantity') || $args->hasChangedField('variant')) {
            $this->queue->addKit($kitItem->getKit());
        }
    }

    public function postPersist(KitItem $kitItem, PostPersistEventArgs $args): void
    {
        $this->queue->addKit($kitItem->getKit());
    }

    public function preRemove(KitItem $kitItem, PreRemoveEventArgs $args): void
    {
        $uow = $args->getObjectManager()->getUnitOfWork();
        $entityChangeSet = $uow->getEntityChangeSet($kitItem);

        if (array_key_exists('kit', $entityChangeSet)) {
            $kit = $entityChangeSet['kit'][0] instanceof Kit ? $entityChangeSet['kit'][0] : null;

            if ($kit) {
                $this->queue->addKit($kit);
            }
        }
    }
}
