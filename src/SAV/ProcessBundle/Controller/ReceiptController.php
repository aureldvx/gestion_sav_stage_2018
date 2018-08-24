<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\CentreSav;
use SAV\ProcessBundle\Entity\ParcoursProduit;
use SAV\ProcessBundle\Form\ParcoursProduitType;
use SAV\ProcessBundle\Form\ParcoursProduitCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SAV\ProcessBundle\Repository\ParcoursProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

            if(empty($formNumeroBar) || empty($formNumeroSerie))
            {
                // Formattage du N° de BAR
                if (empty($formNumeroSerie)) {
                    $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $formNumeroBar);
                    $numeroSerie = preg_replace('#([a-z]{3})([0-9]{9})#i', '$2', $formNumeroBar);
                }

                // Formattage du N° de série et renvoi vers le BAR correspondant
                if (empty($formNumeroBar)) {
                    // ICI = chercher le BAR correspondant
                    // Appel au webservice
                    // Retour en XML
                    $numeroSerie = preg_replace('#[0-9]{9}#', '$0', $formNumeroSerie);
                    $bar = preg_replace('#[0-9]{9}#', 'BAR$0', $formNumeroSerie);
                }

                /* DÉBUT : à modifier quand webservice actif */
                $receipt->setDateReception(new \DateTime());
                $receipt->setNumeroSav(14);
                $receipt->setPaysSav(2);
                /* FIN : à modifier quand webservice actif */

                $em = $this->getDoctrine()->getManager();
                $em->flush();

                // BAR hors-délai ou non
                if($receipt->getBarHorsDelai() == 1) {
                    $modalHorsDelai = 'is-active';

                    $receipt->setPaiementParClient(true);

                    $em->flush();

                    return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
                        'form' => $form->createView(),
                        'modalHorsDelai' => $modalHorsDelai,
                    ));
                }
                else
                {
                    return $this->redirectToRoute('receipt_product_check', array('numeroBar' => $bar));
                }
            }
        }
        // Si première arrivée sur la page
        return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
            'form' => $form->createView(),
            'modalHorsDelai' => $modalHorsDelai,
        ));
    }

    public function checkAction(ParcoursProduit $produit, Request $request)
    {

        // Cas où on supprime le commentaire réception
        if(!empty($request->query->get('delete'))) {
            if ($request->query->get('delete') == 'yes') {
                $produit->setCommentaireReception(null);
                $statutReception = $produit->getStatutReception();
                switch ($statutReception) {
                    case 3 :
                        $statutReception = 1;
                        break;

                    case 4:
                        $statutReception = 2;
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
                    $statutReception = 3;
                break;

                case 2:
                    $statutReception = 4;
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
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SAVProcessBundle:ParcoursProduit');

        // Cas où on annule le refus d'un produit
        if($request->isMethod('POST'))
        {
            $bar = $_POST['numeroBar'];
            $produit = $repository->findOneBy(array(
                'numeroBar' => $bar,
            ));

            $statutReception = $produit->getStatutReception();
            switch($statutReception)
            {
                case 2:
                    $statutReception = 1;
                break;

                case 4:
                    $statutReception = 3;
                break;
            }
            $produit->setStatutReception($statutReception);
            $produit->setRaisonRefusProduit(null);
            $produit->setUrlPhotoRefus(null);
            $em->flush();
        }


        // Affichage lors de la première arrivée
        $listProducts = $repository
            ->getOverview('p.statutReception', 'DESC');


        // Récupération des tags de tri de l'URL
        if(!empty($request))
        {
            $statut = $request->query->get('statut');
            $filter = $request->query->get('filter');
            $order = $request->query->get('order');

            $listStatuts = array(
                'all',
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

            // Tri des données on fonction des tags de l'URL
            if(in_array($filter, $listFilter) && in_array($order, $listOrder))
            {
                if(in_array($statut, $listStatuts))
                {
                    switch ($statut)
                    {
                        case 'all':
                            $listProducts = $repository
                                ->getOverview($filter, $order);
                        break;

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

                        default:
                            $listProducts = $repository
                                ->getOverview($filter, $order);
                        break;
                    }
                }
            }

            // Cas où on valide la liste d'importation
            $action = $request->query->get('action');

            if($action == 'import')
            {
                $listImport = $repository->getImportList();

                foreach ($listImport as $import)
                {
                    switch($import->getStatutReception())
                    {
                        case 1 :
                            $import->setStatutReparation(1);
                            $import->setImporte(true);
                        break;

                        case 2 :
                            $import->setPaiementClient(true);
                            $import->setImporte(true);
                        break;

                        case 3 :
                            $import->setStatutReparation(1);
                            $import->setImporte(true);
                        break;

                        case 4 :
                            $import->setPaiementClient(true);
                            $import->setImporte(true);
                        break;
                    }
                }
                $request->getSession()->getFlashBag()->add('notice', "Tous les produits de la liste ont été importé et dispatché dans les stocks de votre SAV");
                    return $this->redirectToRoute('home_dashboard');
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