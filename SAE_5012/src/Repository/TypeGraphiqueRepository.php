<?php

namespace App\Repository;

use App\Entity\TypeGraphique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeGraphique>
 *
 * @method TypeGraphique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeGraphique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeGraphique[]    findAll()
 * @method TypeGraphique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeGraphiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeGraphique::class);
    }

//    /**
//     * @return TypeGraphique[] Returns an array of TypeGraphique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeGraphique
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
