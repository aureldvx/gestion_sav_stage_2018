<?php

namespace SAV\ProcessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SAV\ProcessBundle\Entity\ParcoursProduit;
class LoadParcoursProduit implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR023456789');
        $produit->setNumeroSerie('023456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR123456789');
        $produit->setNumeroSerie('123456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR223456789');
        $produit->setNumeroSerie('223456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR323456789');
        $produit->setNumeroSerie('323456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR423456789');
        $produit->setNumeroSerie('423456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR523456789');
        $produit->setNumeroSerie('523456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR623456789');
        $produit->setNumeroSerie('623456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR723456789');
        $produit->setNumeroSerie('723456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR823456789');
        $produit->setNumeroSerie('823456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR923456789');
        $produit->setNumeroSerie('923456789');
        $produit->setClient(3);
        $produit->setReferenceProduit(123);
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $manager->flush();
    }
}