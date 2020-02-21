<?php

namespace App\Repository;

use App\Entity\Souscripteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Souscripteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Souscripteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Souscripteur[]    findAll()
 * @method Souscripteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SouscripteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Souscripteur::class);
    }

    // /**
    //  * @return Souscripteur[] Returns an array of Souscripteur objects
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
    public function findOneBySomeField($value): ?Souscripteur
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
