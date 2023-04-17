<?php

namespace App\Repository;

use App\Entity\OuvertureExcept;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OuvertureExcept>
 *
 * @method OuvertureExcept|null find($id, $lockMode = null, $lockVersion = null)
 * @method OuvertureExcept|null findOneBy(array $criteria, array $orderBy = null)
 * @method OuvertureExcept[]    findAll()
 * @method OuvertureExcept[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvertureExceptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OuvertureExcept::class);
    }

    public function save(OuvertureExcept $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OuvertureExcept $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OuvertureExcept[] Returns an array of OuvertureExcept objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OuvertureExcept
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
