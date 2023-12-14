<?php

namespace App\Repository;

use App\Entity\Medecinm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Medecinm>
 *
 * @method Medecinm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medecinm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medecinm[]    findAll()
 * @method Medecinm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedecinmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medecinm::class);
    }

//    /**
//     * @return Medecinm[] Returns an array of Medecinm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Medecinm
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
