<?php

namespace App\Repository;

use App\Entity\FichePerso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FichePerso|null find($id, $lockMode = null, $lockVersion = null)
 * @method FichePerso|null findOneBy(array $criteria, array $orderBy = null)
 * @method FichePerso[]    findAll()
 * @method FichePerso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichePersoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FichePerso::class);
    }

    // /**
    //  * @return FichePerso[] Returns an array of FichePerso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FichePerso
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
