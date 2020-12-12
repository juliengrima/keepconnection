<?php

namespace App\Repository;

use App\Entity\Ticketting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ticketting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticketting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticketting[]    findAll()
 * @method Ticketting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TickettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticketting::class);
    }

    // /**
    //  * @return Ticketting[] Returns an array of Ticketting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ticketting
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
