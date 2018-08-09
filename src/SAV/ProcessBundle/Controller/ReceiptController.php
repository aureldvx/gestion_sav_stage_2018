<?php

namespace SAV\ProcessBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class ReceiptController extends Controller
{
    public function indexAction()
    {
        return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig');
    }

    public function checkAction($numero_bar)
    {
        return new Response("Voici le numero de BAR : " . $numero_bar);
    }
}