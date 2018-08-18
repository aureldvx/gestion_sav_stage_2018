<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\CentreSav;
use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use SAV\ProcessBundle\Form\ParcoursProduitCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SAV\ProcessBundle\Repository\ParcoursProduitRepository;

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
        if(null == $produit->getStatutReception())
        {
            $produit->setStatutReception(1);
        }

        if(null == $produit->getDateReception())
        {
            $produit->setDateReception(new \DateTime());
        }

        if(null == $produit->getNumeroSav())
        {
            $produit->setNumeroSav(0); // A modifier dynamiquement
        }

        if(null == $produit->getPaysSav())
        {
            $produit->setPaysSav(1); // A modifier dynamiquement
        }


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
            return $this->redirectToRoute('receipt_product_check', array('numeroBar' => $produit->getNumeroBar()));
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->render('SAVProcessBundle:Receipt:receipt-check.html.twig', array(
            'produit' => $produit,
        ));
    }

    public function reviewAction(ParcoursProduit $produit, Request $request)
    {
        $form = $this->get('form.factory')->create(ParcoursProduitCommentType::class, $produit);

        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            $formCommentReception = $form->getData()->getCommentaireReception();
            $produit->setCommentaireReception($formCommentReception);

            // Changement du statut de réception pour changement d'affichage
            $statutReception = $produit->getStatutReception();

            switch ($statutReception)
            {
                case 1:
                    $statutReception = 4;
                break;

                case 13:
                    $statutReception = 5;
                break;
            }

            $produit->setStatutReception($statutReception);
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('receipt_product_check', array('numeroBar' => $produit->getNumeroBar()));
        }

        return $this->render('SAVProcessBundle:Receipt:receipt-product-review.html.twig', array(
            'form' => $form->createView(),
            'produit' => $produit,
        ));
    }

    public function overviewAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAVProcessBundle:ParcoursProduit')
        ;

        if(empty($request) || $request->query->get('statut') == "all")
        {
            $listProducts = $repository
                ->getOverview('p.statutReception', 'DESC');
        }

        // Récupération des tags de l'URL
        if(!empty($request))
        {
            $listProducts = $repository
                ->getOverview('p.statutReception', 'DESC');

            $statut = $request->query->get('statut');
            $filter = $request->query->get('filter');
            $order = $request->query->get('order');

            if($statut == 'all')
            {
                $listProducts = $repository
                    ->getOverview('p.statutReception', 'DESC');
            }

            $listStatuts = array(
                'valid',
                'faibleValeur',
                'rejected',
                'commented'
            );

            $listFilter = array(
                'p.statutReception',
                'p.client',
                'p.referenceProduit',
                'p.traitementPrevu',
                'p.statutRception'
            );

            $listOrder = array(
                'ASC',
                'DESC'
            );

            if(in_array($filter, $listFilter) && in_array($order, $listOrder))
            {
                if(in_array($statut, $listStatuts))
                {
                    switch ($statut)
                    {
                        case 'valid':
                            $listProducts = $repository
                                ->getOverviewValid($filter, $order);
                        break;

                        case 'faibleValeur':
                            $listProducts = $repository
                                ->getOverviewFaibleValeur($filter, $order);
                        break;

                        case 'rejected':
                            $listProducts = $repository
                                ->getOverviewRejected($filter, $order);
                        break;

                        case 'commented':
                            $listProducts = $repository
                                ->getOverviewCommented($filter, $order);
                        break;
                    }
                }
            }
        }

        // Comptage et affichage du nombre de lignes correspondantes à chaque statut
        $linesValid = $repository
            ->countLinesValid();

        $linesCommented = $repository
            ->countLinesCommented();

        $linesFaibleValeur = $repository
            ->countLinesFaibleValeur();

        $linesRejected = $repository
            ->countLinesRejected();

        $linesTotal = $repository
            ->countLinesTotal();

        return $this->render('SAVProcessBundle:Receipt:overview.html.twig', array(
            'listProducts' => $listProducts,
            'linesValid' => $linesValid,
            'linesCommented' => $linesCommented,
            'linesFaibleValeur' => $linesFaibleValeur,
            'linesRejected' => $linesRejected,
            'linesTotal' => $linesTotal
        ));
    }
}