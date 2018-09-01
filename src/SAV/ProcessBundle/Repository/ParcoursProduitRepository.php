<?php

namespace SAV\ProcessBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
class ParcoursProduitRepository extends EntityRepository
{
    /*
     * 1 : PARTIE RÉCEPTION
    */

    /*
     * Récupérer toutes les réceptions non-importées
     */
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

    public function countLinesTotal()
    {
        return (int) $this->countLinesValid() + $this->countLinesFaibleValeur() + $this->countLinesRejected() + $this->countLinesCommented();
    }

    /*
     * Récupérer toutes les réceptions valides non-importées
     */
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

    public function countLinesValid()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 1')
            ->andWhere('p.faibleValeur = 0')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /*
     * Récupérer toutes les réceptions à faible valeur non-importées
     */
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

    public function countLinesFaibleValeur()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 1')
            ->andWhere('p.faibleValeur = 1')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /*
     * Récupérer toutes les réceptions avec commentaire non-importées
     */
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

    public function countLinesCommented()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 3')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /*
     * Récupérer toutes les réceptions refusées non-importées
     */
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

    public function countLinesRejected()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReception  = 2')
            ->orWhere('p.statutReception = 4')
            ->andWhere('p.importe = 0');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /*
     * Récupérer la liste des produits pas encore importés
     */
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

    /*
     * 2 : PARTIE RÉPARATIONS
     */

    /*
     * Récupérer toutes les réparations du SAV
     */
    public function getAllRepairs($filter, $order)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where('p.statutReparation = 1')
            ->orWhere('p.statutReparation = 2')
            ->orWhere('p.statutReparation = 3')
            ->orWhere('p.statutReparation = 4')
            ->andWhere($qb->expr()->isNull('p.dateReparation'))
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function countTotalRepairs()
    {
        return (int) $this->countRepairs() + $this->countRefurbished();
    }

    /*
     * Récupérer tous les produits en RÉPARATION
     */
    public function getRepairs($filter, $order){
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where('p.statutReparation = 1')
            ->orWhere('p.statutReparation = 3')
            ->andWhere($qb->expr()->isNull('p.dateReparation'))
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function countRepairs()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReparation  = 1')
            ->orWhere('p.statutReparation = 3')
            ->andWhere($qb->expr()->isNull('p.dateReparation'));

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /*
     * Récupérer tous les produits en RECONDITIONNEMENT
     */
    public function getRefurbished($filter, $order){
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where('p.statutReparation = 2')
            ->orWhere('p.statutReparation = 4')
            ->andWhere($qb->expr()->isNull('p.dateReparation'))
            ->orderBy($filter, $order);

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function countRefurbished()
    {
        $qb = $this->createQueryBuilder('p');

        $qb->select($qb->expr()->count('p'))
            ->where('p.statutReparation  = 2')
            ->orWhere('p.statutReparation = 4')
            ->andWhere($qb->expr()->isNull('p.dateReparation'));

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function searchBar($numeroBar)
    {
        $this->findBy(array(
            'numeroBar' => $numeroBar
        ));
    }
}
