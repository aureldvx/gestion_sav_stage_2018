<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\CentreSav;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }

        return $this->render('@SAVProcess/Home/index.html.twig', array(
            'locale' => $locale,
        ));
    }
}