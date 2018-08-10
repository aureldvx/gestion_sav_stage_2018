<?php

namespace SAV\ProcessBundle\Controller;

use SAV\ProcessBundle\Entity\ParcoursProduit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class ReceiptController extends Controller
{
    public function indexAction(Request $request)
    {
        $receipt = new ParcoursProduit();

        $form = $this->get('form.factory')->createBuilder(FormType::class, $receipt)
            ->add('numero_serie', TextType::class, array('required' => false))
            ->add('numero_bar', TextType::class, array('required' => false))
            ->add('verify', SubmitType::class)
            ->getForm()
        ;

        return $this->render('SAVProcessBundle:Receipt:receipt-home.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function checkAction($numero_bar)
    {
        return new Response("Voici le numero de BAR : " . $numero_bar);
    }
}