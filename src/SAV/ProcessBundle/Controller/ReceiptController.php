<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiptController extends Controller
{
    public function indexAction(Request $request)
    {
        $receipt = new ParcoursProduit();

        $form = $this->get('form.factory')->create(ParcoursProduitType::class, $receipt);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);


            if(empty($receipt->getNumeroSerie()))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $receipt->getNumeroBar());
                return $this->redirectToRoute('receipt_product_check', array('numero_bar' => $bar));
            }
            if(empty($receipt->getNumeroBar()))
            {
                $numeroSerie = $receipt->getNumeroSerie();
                // ICI = chercher le BAR correspondant
                // Appel au webservice
                // Retour en XML
                $bar = preg_replace('#[0-9]{9}#', 'BAR$0' , $numeroSerie);
                return $this->redirectToRoute('receipt_product_check', array('numero_bar' => $bar));
            }
        }

        return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function checkAction($numero_bar)
    {
        return new Response("Voici le numero de BAR : " . $numero_bar);
    }
}