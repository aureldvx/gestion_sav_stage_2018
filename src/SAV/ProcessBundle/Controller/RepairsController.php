<?php

namespace SAV\ProcessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepairsController extends Controller
{
    public function indexAction()
    {
        return new Response("Repair : ça marche !");
    }
}