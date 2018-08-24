<?php

namespace SAV\ProcessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SAV\ProcessBundle\Entity\Client;
class LoadClient implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setReference(1);
        $client->setNom('Auchan');
        $client->setTelephone('0000000000');
        $client->setFax('0000000000');
        $client->setEmail('auchan@auchan.fr');
        $client->setAdresse('Adresse Auchan');
        $client->setCodePostal('16000');
        $client->setVille('Ville Auchan');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(2);
        $client->setNom('Carrefour');
        $client->setTelephone('0101010101');
        $client->setFax('1010101010');
        $client->setEmail('carrefour@carrefour.fr');
        $client->setAdresse('Adresse Carrefour');
        $client->setCodePostal('16100');
        $client->setVille('Ville Carrefour');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(3);
        $client->setNom('Super U');
        $client->setTelephone('0202020202');
        $client->setFax('2020202020');
        $client->setEmail('superu@superu.fr');
        $client->setAdresse('Adresse Super U');
        $client->setCodePostal('16200');
        $client->setVille('Ville Super U');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(4);
        $client->setNom('Intermarché');
        $client->setTelephone('0303030303');
        $client->setFax('3030303030');
        $client->setEmail('intermarche@intermarche.fr');
        $client->setAdresse('Adresse Intermarché');
        $client->setCodePostal('16300');
        $client->setVille('Ville Intermarché');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(5);
        $client->setNom('Grand Frais');
        $client->setTelephone('0404040404');
        $client->setFax('4040404040');
        $client->setEmail('grandfrais@grandfrais.fr');
        $client->setAdresse('Adresse Grand Frais');
        $client->setCodePostal('16400');
        $client->setVille('Ville Grand Frais');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(6);
        $client->setNom('Intersport');
        $client->setTelephone('0505050505');
        $client->setFax('5050505050');
        $client->setEmail('intersport@intersport.fr');
        $client->setAdresse('Adresse Intersport');
        $client->setCodePostal('16500');
        $client->setVille('Ville Intersport');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(7);
        $client->setNom('Apple');
        $client->setTelephone('0606060606');
        $client->setFax('6060606060');
        $client->setEmail('apple@apple.fr');
        $client->setAdresse('Adresse Apple');
        $client->setCodePostal('16600');
        $client->setVille('Ville Apple');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(8);
        $client->setNom('Samsung');
        $client->setTelephone('0707070707');
        $client->setFax('7070707070');
        $client->setEmail('samsung@samsung.fr');
        $client->setAdresse('Adresse Samsung');
        $client->setCodePostal('16700');
        $client->setVille('Ville Samsung');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(9);
        $client->setNom('Huawei');
        $client->setTelephone('0808080808');
        $client->setFax('8080808080');
        $client->setEmail('huawei@huawei.fr');
        $client->setAdresse('Adresse Huawei');
        $client->setCodePostal('16800');
        $client->setVille('Ville Huawei');
        $manager->persist($client);

        $client = new Client();
        $client->setReference(10);
        $client->setNom('ASUS');
        $client->setTelephone('0909090909');
        $client->setFax('0909090909');
        $client->setEmail('asus@asus.fr');
        $client->setAdresse('Adresse Asus');
        $client->setCodePostal('16900');
        $client->setVille('Ville Asus');
        $manager->persist($client);

        $manager->flush();
    }
}