<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use SAV\ProcessBundle\SAVProcessBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TreatmentController extends Controller
{
    public function indexAction(Request $request){
        $treatment = new ParcoursProduit();

        $form = $this->get('form.factory')->create(ParcoursProduitType::class, $treatment);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $formNumeroSerie = $form->getData()->getNumeroSerie();
            $formNumeroBar = $form->getData()->getNumeroBar();

            if(empty($treatment->getNumeroSerie()))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $formNumeroBar);
                return $this->redirectToRoute('treatment_product_detail', array('numeroBar' => $bar));
            }
            if(empty($treatment->getNumeroBar()))
            {
                // ICI = chercher le BAR correspondant
                // Appel au webservice
                // Retour en XML
                $bar = preg_replace('#[0-9]{9}#', 'BAR$0' , $formNumeroSerie);
                return $this->redirectToRoute('treatment_product_detail', array('numeroBar' => $bar));
            }
        }

        return $this->render('SAVProcessBundle:Treatment:treatment-home.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function detailAction(ParcoursProduit $produit)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SAVProcessBundle:Client');
        $client = $repository->findBy(array(
            'reference' => $produit->getClient()
        ));

        return $this->render('SAVProcessBundle:Treatment:product-detail.html.twig', array(
            'produit' => $produit,
            'client' => $client
        ));
    }

    public function confirmedFailureAction(ParcoursProduit $produit)
    {
        return $this->render('SAVProcessBundle:Treatment:confirmed-failure.html.twig', array(
            'produit' => $produit
        ));
    }
}