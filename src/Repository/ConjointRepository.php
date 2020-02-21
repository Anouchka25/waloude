<?php

namespace App\Repository;

use App\Entity\Conjoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Conjoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conjoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conjoint[]    findAll()
 * @method Conjoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConjointRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conjoint::class);
    }

    // /**
    //  * @return Conjoint[] Returns an array of Conjoint objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conjoint
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
