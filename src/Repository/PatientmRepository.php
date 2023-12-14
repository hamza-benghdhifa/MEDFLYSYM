<?php

namespace App\Repository;

use App\Entity\Patientm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Patientm>
 *
 * @method Patientm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patientm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patientm[]    findAll()
 * @method Patientm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patientm::class);
    }

//    /**
//     * @return Patientm[] Returns an array of Patientm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Patientm
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
