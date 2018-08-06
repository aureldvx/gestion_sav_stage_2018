<?php

namespace SAV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SAVCoreBundle:Default:index.html.twig');
    }
}
