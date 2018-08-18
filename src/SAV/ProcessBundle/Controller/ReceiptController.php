<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\CentreSav;
use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use SAV\ProcessBundle\Form\ParcoursProduitCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiptController extends Controller
{
    public function indexAction(Request $request)
    {
        $receipt = new ParcoursProduit();
        $sav = new CentreSav();

        // Import du formulaire de vérification
        $form = $this->get('form.factory')->create(ParcoursProduitType::class, $receipt);

        // Initialisation du modal "BAR hors-délai" pour le cacher
        $modalHorsDelai = '';

        // Si le formulaire est soumis
        if($request->isMethod('POST')) {

            $form->handleRequest($request);

            $formNumeroSerie = $form->getData()->getNumeroSerie();
            $formNumeroBar = $form->getData()->getNumeroBar();

            if(empty($formNumeroSerie) && empty($formNumeroBar))
            {
                return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
                    'form' => $form->createView(),
                    'modalHorsDelai' => $modalHorsDelai,
                ));
            }

            // Formattage du N° de BAR
            if (empty($formNumeroSerie)) {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $formNumeroBar);
            }

            // Formattage du N° de série et renvoi vers le BAR correspondant
            if (empty($formNumeroBar)) {
                // ICI = chercher le BAR correspondant
                // Appel au webservice
                // Retour en XML
                $bar = preg_replace('#[0-9]{9}#', 'BAR$0', $formNumeroSerie);
            }

            // BAR hors-délai ou non
            if ($receipt->getBarHorsDelai() == true) {
                $modalHorsDelai = 'is-active';

                $receipt->setDateReception(new \DateTime());
                $receipt->setPaiementParClient(true);
                $receipt->setNumeroSav(0);
                $receipt->setPaysSav(1);

                $em = $this->getDoctrine()->getManager();
                $em->persist($receipt);
                $em->flush();

                return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
                    'form' => $form->createView(),
                    'modalHorsDelai' => $modalHorsDelai,
                ));
            }

            return $this->redirectToRoute('receipt_product_check', array('numeroBar' => $bar));

        }

        // Si première arrivée sur la page
        return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
            'form' => $form->createView(),
            'modalHorsDelai' => $modalHorsDelai,
        ));
    }

    public function checkAction(ParcoursProduit $produit, Request $request)
    {
        // Définition des champs internes
        $produit->setStatutReception(1);
        $produit->setDateReception(new \DateTime());
        $produit->setNumeroSav(0); // A modifier dynamiquement
        $produit->setPaysSav(1); // A modifier dynamiquement

        // Cas où on supprime le commentaire réception
        if(!empty($request->query->get('delete'))) {
            if ($request->query->get('delete') == 'yes') {
                $produit->setCommentaireReception(null);
                $statutReception = $produit->getStatutReception();
                switch ($statutReception) {
                    case 4 :
                        $statutReception = 1;
                        break;

                    case 5:
                        $statutReception = 3;
                }
                $produit->setStatutReception($statutReception);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            return $this->redirectToRoute('receipt_product_check', array('numero_bar' => $produit->getNumeroBar()));
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->render('SAVProcessBundle:Receipt:receipt-check.html.twig', array(
            'produit' => $produit,
            'numeroBar' => $produit->getNumeroBar()
        ));
    }

    public function reviewAction(ParcoursProduit $numeroBar, Request $request)
    {

    }
}