<?php

namespace App\Repository;

use App\Entity\Binder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Binder>
 *
 * @method Binder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Binder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Binder[]    findAll()
 * @method Binder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BinderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Binder::class);
    }

    //    /**
    //     * @return Binder[] Returns an array of Binder objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Binder
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
