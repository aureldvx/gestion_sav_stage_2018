<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Entity\Produit;
use SAV\ProcessBundle\Entity\PieceDetachee;
use SAV\ProcessBundle\Entity\MouvementStockProduit;
use SAV\ProcessBundle\Entity\MouvementStockPieceDetachee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductSplittingController extends Controller
{
    public function indexAction()
    {
        return new Response("ProductSplitting : ca marche !");
    }
}