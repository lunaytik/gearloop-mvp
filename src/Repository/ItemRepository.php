<?php

namespace App\Repository;

use App\Entity\Item;
use App\Enum\ItemStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @extends ServiceEntityRepository<Item>
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function findActiveItems(array $criteria = []): array
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.isActive = :active')
            ->andWhere('i.deletedAt IS NULL')
            ->andWhere('i.status = :status')
            ->setParameter('active', true)
            ->setParameter('status', ItemStatus::VALIDATED)
        ;

        if (!empty($criteria['rootCategory']) && empty($criteria['subcategory'])) {
            $categories = $criteria['rootCategory']->getChildren();

            $qb->andWhere('i.category IN(:children)')
                ->setParameter('children', $categories)
            ;
        } elseif (!empty($criteria['rootCategory']) && !empty($criteria['subcategory'])) {
            $qb->andWhere('i.category = :category')
                ->setParameter('category', $criteria['subcategory'])
            ;
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(i.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'latest') {
            $qb->orderBy('i.updatedAt', 'DESC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'a-z') {
            $qb->orderBy('i.name', 'ASC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'z-a') {
            $qb->orderBy('i.name', 'DESC');
        }

        // Pagination
        $page = $criteria['page'] ?? 1;
        $limit = $criteria['limit'] ?? 12;

        $qb->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

    public function countActiveItems(array $criteria = []): int
    {
        $qb = $this->createQueryBuilder('i')
            ->select('COUNT(i.id)')
            ->where('i.isActive = :active')
            ->andWhere('i.deletedAt IS NULL')
            ->setParameter('active', true)
        ;

        if (!empty($criteria['rootCategory']) && empty($criteria['subcategory'])) {
            $categories = $criteria['rootCategory']->getChildren();

            $qb->andWhere('i.category IN(:children)')
                ->setParameter('children', $categories);
        } elseif (!empty($criteria['rootCategory']) && !empty($criteria['subcategory'])) {
            $qb->andWhere('i.category = :category')
                ->setParameter('category', $criteria['subcategory']);
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(i.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function findCurrentUserItems(UserInterface $user, array $criteria = []): array
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.createdBy = :user')
            ->setParameter('user', $user)
        ;

        if (isset($criteria['status'])) {
            $qb->andWhere('i.status = :status')
                ->setParameter('status', ItemStatus::tryFrom($criteria['status']));
        }

        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Item[] Returns an array of Item objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Item
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
