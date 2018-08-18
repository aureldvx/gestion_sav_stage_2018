<?php

namespace SAV\ProcessBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ParcoursProduitRepository extends EntityRepository
{
    public function getProduct($numeroBar)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.numeroBar = :numeroBar')
            ->setParameter('numeroBar', $numeroBar)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return $qb;
    }
}
