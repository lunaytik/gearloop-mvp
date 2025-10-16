<?php

namespace App\Repository;

use App\Entity\Kit;
use App\Enum\ActivityType;
use App\Enum\Season;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @extends ServiceEntityRepository<Kit>
 */
class KitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kit::class);
    }

    public function findPublicKits(array $criteria = []): array
    {
        $qb = $this->createQueryBuilder('k')
            ->where('k.isPublic = :public')
            ->setParameter('public', true)
        ;

        if (!empty($criteria['activityType'])) {
            $qb->andWhere('k.activityType = :type')
                ->setParameter('type', ActivityType::tryFrom($criteria['activityType']));
        }

        if (!empty($criteria['season'])) {
            $qb->andWhere('k.season = :season')
                ->setParameter('season', Season::tryFrom($criteria['season']));
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(k.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'latest') {
            $qb->orderBy('k.updatedAt', 'DESC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'a-z') {
            $qb->orderBy('k.name', 'ASC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'z-a') {
            $qb->orderBy('k.name', 'DESC');
        }

        // Pagination
        $page = $criteria['page'] ?? 1;
        $limit = $criteria['limit'] ?? 12;

        $qb->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

    public function countPublicKits(array $criteria = []): int
    {
        $qb = $this->createQueryBuilder('k')
            ->select('COUNT(k.id)')
            ->where('k.isPublic = :public')
            ->setParameter('public', true);

        if (!empty($criteria['activityType'])) {
            $qb->andWhere('k.activityType = :type')
                ->setParameter('type', ActivityType::tryFrom($criteria['activityType']));
        }

        if (!empty($criteria['season'])) {
            $qb->andWhere('k.season = :season')
                ->setParameter('season', Season::tryFrom($criteria['season']));
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(k.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function findCurrentUserKits(UserInterface $user, array $criteria = []): array
    {
        $qb = $this->createQueryBuilder('k')
            ->where('k.owner = :user')
            ->setParameter('user', $user)
        ;

        if (!empty($criteria['activityType'])) {
            $qb->andWhere('k.activityType = :type')
                ->setParameter('type', ActivityType::tryFrom($criteria['activityType']));
        }

        if (!empty($criteria['season'])) {
            $qb->andWhere('k.season = :season')
                ->setParameter('season', Season::tryFrom($criteria['season']));
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(k.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'latest') {
            $qb->orderBy('k.updatedAt', 'DESC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'a-z') {
            $qb->orderBy('k.name', 'ASC');
        }

        if(isset($criteria['sort']) && $criteria['sort'] === 'z-a') {
            $qb->orderBy('k.name', 'DESC');
        }

        if(!empty($criteria['visibility'])) {
            $isPublic = $criteria['visibility'] == 'public';

            $qb->andWhere('k.isPublic = :public')
                ->setParameter('public', $isPublic);
        }

        // Pagination
        $page = $criteria['page'] ?? 1;
        $limit = $criteria['limit'] ?? 12;

        $qb->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

    public function countCurrentUserKits(UserInterface $user, array $criteria = []): int
    {
        $qb = $this->createQueryBuilder('k')
            ->select('COUNT(k.id)')
            ->where('k.owner = :user')
            ->setParameter('user', $user);

        if (!empty($criteria['activityType'])) {
            $qb->andWhere('k.activityType = :type')
                ->setParameter('type', ActivityType::tryFrom($criteria['activityType']));
        }

        if (!empty($criteria['season'])) {
            $qb->andWhere('k.season = :season')
                ->setParameter('season', Season::tryFrom($criteria['season']));
        }

        if (isset($criteria['search'])) {
            $qb->andWhere('LOWER(k.name) LIKE :search')
                ->setParameter('search', '%' . strtolower($criteria['search']) . '%');
        }

        if(!empty($criteria['visibility'])) {
            $isPublic = $criteria['visibility'] == 'public';

            $qb->andWhere('k.isPublic = :public')
                ->setParameter('public', $isPublic);
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    //    /**
    //     * @return Kit[] Returns an array of Kit objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('k')
    //            ->andWhere('k.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('k.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Kit
    //    {
    //        return $this->createQueryBuilder('k')
    //            ->andWhere('k.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
