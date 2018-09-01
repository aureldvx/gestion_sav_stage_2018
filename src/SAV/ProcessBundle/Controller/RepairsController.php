<?php

namespace SAV\ProcessBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepairsController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SAVProcessBundle:ParcoursProduit');

        $repositoryPieces = $em->getRepository('SAVProcessBundle:PieceDetachee');
        $pieceDetachees = $repositoryPieces->findAll();

        /*
         * Affichage lors de la première arrivée
         */
        $listRepairs = $repository->getAllRepairs('p.statutReparation', 'DESC');

        /*
         * Récupération des tags de tri de l'URL
         */
        if(!empty($request)) {
            $statut = $request->query->get('statut');
            $filter = $request->query->get('filter');
            $order = $request->query->get('order');

            $listStatuts = array(
                'all',
                'repair',
                'refurbished'
            );

            $listFilter = array(
                'p.statutReparation',
                'p.client',
                'p.referenceProduit'
            );

            $listOrder = array(
                'ASC',
                'DESC'
            );

            // Tri des données on fonction des tags de l'URL
            if (in_array($filter, $listFilter) && in_array($order, $listOrder)) {
                if (in_array($statut, $listStatuts)) {
                    switch ($statut) {
                        case 'all':
                            $listRepairs = $repository
                                ->getAllRepairs($filter, $order);
                            break;

                        case 'repair':
                            $listRepairs = $repository
                                ->getRepairs($filter, $order);
                            break;

                        case 'refurbished':
                            $listRepairs = $repository
                                ->getRefurbished($filter, $order);
                            break;

                        default:
                            $listRepairs = $repository
                                ->getAllRepairs($filter, $order);
                            break;
                    }
                }
            }
        }

        /*
         * Cas d'une recherche par N° de série ou N° de BAR
         */
        if($request->isMethod('POST'))
        {
            $searchForm = $_POST['search'];

            if(preg_match('#([a-z]{3})([0-9]{9})#i', $searchForm))
            {
                $bar = preg_replace('#([a-z]{3})([0-9]{9})#i', 'BAR$2', $searchForm);
                $listRepairs = $repository->findBy(array(
                    'numeroBar' => $bar
                ));
            }
            elseif(preg_match('#[0-9]{9}#', $searchForm))
            {
                $listRepairs = $repository->findBy(array(
                    'numeroSerie' => $searchForm
                ));
            }
        }

        /*
         * Importation du comptage de lignes
         */
        $countAll = $repository->countTotalRepairs();
        $countRepairs = $repository->countRepairs();
        $countRefurbished = $repository->countRefurbished();

        return $this->render('SAVProcessBundle:Repairs:repairs-overview.html.twig', array(
            'listRepairs' => $listRepairs,
            'pieceDetachees' => $pieceDetachees,
            'countAll' => $countAll,
            'countRepairs' => $countRepairs,
            'countRefurbished' => $countRefurbished
        ));
    }
}