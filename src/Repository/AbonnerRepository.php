<?php

namespace App\Repository;

use App\Entity\Abonner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Abonner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abonner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abonner[]    findAll()
 * @method Abonner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbonnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abonner::class);
    }

    // /**
    //  * @return Abonner[] Returns an array of Abonner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abonner
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
