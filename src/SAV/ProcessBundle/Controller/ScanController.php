<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use SAV\ProcessBundle\SAVProcessBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ScanController extends Controller
{
    public function indexAction(Request $request)
    {
        $scan = new ParcoursProduit();

        $form = $this->get('form.factory')->create(ParcoursProduitType::class, $scan);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('SAVProcessBundle:ParcoursProduit');

            if(empty($scan->getNumeroSerie()))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $scan->getNumeroBar());

                $resultat = $repository->findByNumeroBar($bar);
                if(!$resultat)
                {
                    $request->getSession()->getFlashBag()->add('notice', 'Aucun produit avec ce numéro de BAR n\'est passé dans votre SAV');
                    return $this->redirectToRoute('scan_home');
                }

                return $this->redirectToRoute('scan_view', array('numero_bar' => $bar));
            }
            if(empty($scan->getNumeroBar()))
            {
                $numeroSerie = $scan->getNumeroSerie();
                // ICI = chercher le BAR correspondant
                // Appel au webservice
                // Retour en XML
                $bar = preg_replace('#[0-9]{9}#', 'BAR$0' , $numeroSerie);

                $resultat = $repository->findByNumeroBar($bar);
                if(!$resultat)
                {
                    $request->getSession()->getFlashBag()->add('notice', 'Aucun produit avec ce numéro de série n\'est passé dans votre SAV');
                    return $this->redirectToRoute('scan_home');
                }

                return $this->redirectToRoute('scan_view', array('numero_bar' => $bar));
            }

        }

        return $this->render('SAVProcessBundle:Scan:scan-home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function viewAction($numero_bar)
    {
        return new Response("Voici le numero de BAR : " . $numero_bar);
    }
}