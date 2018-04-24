<?php

namespace App\Repository;

use App\Entity\TestGithub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestGithub|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestGithub|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestGithub[]    findAll()
 * @method TestGithub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestGithubRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestGithub::class);
    }

//    /**
//     * @return TestGithub[] Returns an array of TestGithub objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestGithub
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
