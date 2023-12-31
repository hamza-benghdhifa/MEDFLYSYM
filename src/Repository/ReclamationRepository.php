<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reclamation>
 *
 * @method Reclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclamation[]    findAll()
 * @method Reclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

//    /**
//     * @return Reclamation[] Returns an array of Reclamation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reclamation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function findEntitiesByString($str){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT r
                FROM App\Entity\Reclamation r
                WHERE r.sujet LIKE :str 
                OR r.email LIKE :str 
                OR r.description LIKE :str
                OR r.etat LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }
    public function countReclamations(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.idRec)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    public function countNonTraiteReclamations(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.idRec)')
            ->where('r.etat = :etat')
            ->setParameter('etat', 'non traite')
            ->getQuery()
            ->getSingleScalarResult();
    }
    public function countTraiteReclamations(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.idRec)')
            ->where('r.etat = :etat')
            ->setParameter('etat', 'traite')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
