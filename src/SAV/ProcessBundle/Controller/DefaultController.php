<?php

namespace SAV\ProcessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SAVProcessBundle:Default:index.html.twig');
    }
}
