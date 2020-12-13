<?php

namespace App\Repository;

use App\Entity\Downloads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Downloads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Downloads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Downloads[]    findAll()
 * @method Downloads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DownloadsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Downloads::class);
    }

    // /**
    //  * @return Downloads[] Returns an array of Downloads objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Downloads
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
