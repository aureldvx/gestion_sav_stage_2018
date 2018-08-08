<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\CentreSav;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    public function indexAction()
    {
        return new Response("Ca marche !");
    }
}