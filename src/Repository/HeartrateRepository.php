<?php

namespace App\Repository;

use App\Entity\Heartrate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Heartrate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Heartrate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Heartrate[]    findAll()
 * @method Heartrate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeartrateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Heartrate::class);
    }

    // /**
    //  * @return Heartrate[] Returns an array of Heartrate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Heartrate
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
