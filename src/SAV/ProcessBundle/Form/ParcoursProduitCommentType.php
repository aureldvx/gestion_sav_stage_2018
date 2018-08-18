<?php

namespace SAV\ProcessBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ParcoursProduitCommentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('numeroSerie')
            ->remove('numeroBar')
            ->remove('verify')
            ->add('commentaireReception', TextareaType::class, array('required' => false))
            ->add('add', SubmitType::class, array('label' => 'Ajouter les informations'));
    }

    public function getParent()
    {
        return ParcoursProduitType::class;
    }
}
