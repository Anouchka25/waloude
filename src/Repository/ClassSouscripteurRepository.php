<?php

namespace App\Repository;

use App\Entity\ClassSouscripteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassSouscripteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassSouscripteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassSouscripteur[]    findAll()
 * @method ClassSouscripteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassSouscripteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassSouscripteur::class);
    }

    // /**
    //  * @return ClassSouscripteur[] Returns an array of ClassSouscripteur objects
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
    public function findOneBySomeField($value): ?ClassSouscripteur
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
