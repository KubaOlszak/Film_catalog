<?php

namespace App\Repository;

use App\Entity\FilmRoll;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FilmRoll>
 *
 * @method FilmRoll|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmRoll|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmRoll[]    findAll()
 * @method FilmRoll[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRollRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilmRoll::class);
    }

//    /**
//     * @return FilmRoll[] Returns an array of FilmRoll objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FilmRoll
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
