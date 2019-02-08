<?php

namespace App\Repository;

use App\Entity\Pics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pics[]    findAll()
 * @method Pics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pics::class);
    }

    // /**
    //  * @return Pics[] Returns an array of Pics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pics
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
