<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
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


            if(empty($treatment->getNumeroSerie()))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $treatment->getNumeroBar());
                return $this->redirectToRoute('treatment_product_detail', array('numero_bar' => $bar));
            }
            if(empty($treatment->getNumeroBar()))
            {
                $numeroSerie = $treatment->getNumeroSerie();
                // ICI = chercher le BAR correspondant
                // Appel au webservice
                // Retour en XML
                $bar = preg_replace('#[0-9]{9}#', 'BAR$0' , $numeroSerie);
                return $this->redirectToRoute('treatment_product_detail', array('numero_bar' => $bar));
            }
        }

        return $this->render('SAVProcessBundle:Treatment:treatment-home.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function detailAction($numero_bar)
    {
        return new Response("Voici le numero de BAR : " . $numero_bar);
    }
}