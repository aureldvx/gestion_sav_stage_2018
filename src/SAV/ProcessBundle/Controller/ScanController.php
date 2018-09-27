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
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SAVProcessBundle:ParcoursProduit');

        $form = $this->get('form.factory')->create(ParcoursProduitType::class, $repository);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $formNumeroSerie = $form->getData()->getNumeroSerie();
            $formNumeroBar = $form->getData()->getNumeroBar();

            if(empty($formNumeroSerie))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $formNumeroBar);
            }
            if(empty($formNumeroBar))
            {
                $bar = preg_replace('#[0-9]{9}#', '$0' , $formNumeroSerie);
            }

            $resultat = $repository->findBy(array(
                'numeroBar' => $bar
            ));

            if(null == $resultat)
            {
                $request->getSession()->getFlashBag()->add('notice', 'Aucun produit avec ce numéro de BAR n\'est passé dans votre SAV');
                return $this->redirectToRoute('scan_home');
            }
            else
            {
                return $this->redirectToRoute('scan_view', array('numeroBar' => $bar));
            }
        }

        return $this->render('SAVProcessBundle:Scan:scan-home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function viewAction(ParcoursProduit $produit)
    {
        return $this->render('SAVProcessBundle:Scan:view-product.html.twig', array(
            'produit' => $produit
        ));
    }
}