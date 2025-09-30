<?php

namespace App\EventSubscriber;


use App\Service\KitRecalculationQueue;
use App\Service\KitStatsCalculator;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Events;

#[AsDoctrineListener(event: Events::postFlush)]
final class KitRecalculationSubscriber
{
    public function __construct(
        private KitRecalculationQueue $queue,
        private KitStatsCalculator $calculator,
        private EntityManagerInterface $em,
    )
    {
    }

    public function postFlush(PostFlushEventArgs $args): void
    {
        if (!$this->queue->hasKits()) {
            return;
        }

        foreach ($this->queue->consume() as $kit) {
            $stats = $this->calculator->calculateStats($kit);
            $kit->setStats($stats);
        }

        $this->em->flush();
    }

}
