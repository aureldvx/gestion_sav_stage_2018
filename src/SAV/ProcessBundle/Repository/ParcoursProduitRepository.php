<?php

namespace SAV\ProcessBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
class ParcoursProduitRepository extends EntityRepository
{
    public function getOverview($filter, $order)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 1')
            ->orWhere('p.statutReception = 2')
            ->orWhere('p.statutReception = 3')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0')
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getOverviewValid($filter, $order)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 1')
            ->andWhere('p.faibleValeur = 0')
            ->andWhere('p.importe = 0')
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getOverviewFaibleValeur($filter, $order)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 1')
            ->andWhere('p.faibleValeur = 1')
            ->andWhere('p.importe = 0')
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getOverviewCommented($filter, $order)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 3')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0')
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getOverviewRejected($filter, $order)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 2')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0')
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function countLinesValid()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 1')
            ->andWhere('p.faibleValeur = 0')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function countLinesCommented()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 3')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function countLinesFaibleValeur()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 1')
            ->andWhere('p.faibleValeur = 1')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function countLinesRejected()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 2')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function countLinesTotal()
    {
        return (int) $this->countLinesValid() + $this->countLinesFaibleValeur() + $this->countLinesRejected() + $this->countLinesCommented();
    }

    public function getImportList()
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.statutReception = 1')
            ->orWhere('p.statutReception = 2')
            ->orWhere('p.statutReception = 3')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
