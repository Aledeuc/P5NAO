<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TaxrefLien;

class LoadTaxrefLien implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $taxrefLinkCsv = fopen(dirname(__FILE__).'/Resources/taxref_link.csv', 'r');
        $i = 0;
        while(!feof($taxrefLinkCsv)) {
            $line = fgetcsv($taxrefLinkCsv, 600, ';');

            if($i > 0){
                $taxrefLink[$i] = new TaxrefLien();
                $taxrefLink[$i]->setCtName($line[0]);
                $taxrefLink[$i]->setCtType($line[1]);
                $taxrefLink[$i]->setCtAuthors($line[2]);
                $taxrefLink[$i]->setCtTitle($line[3]);
                $taxrefLink[$i]->setCtUrl($line[4]);
                $taxrefLink[$i]->setCdName($line[5]);
                $taxrefLink[$i]->setCtSpid($line[6]);
                $taxrefLink[$i]->setUrlSp($line[7]);

                if($taxrefLink[$i]->getCtName() != null){
                    $manager->persist($taxrefLink[$i]);
                }
            }

            // FLUSH toutes les 25 persistances pour améliorer les performances de chargement
            if($i % 25 == 0){
                $manager->flush();
                $manager->clear();
            }

            $i = $i + 1;
        }
        fclose($taxrefLinkCsv);

        $manager->flush();
    }

    /**
    +     * Get the order of this fixture
    +     * @return integer
    +     */
    public function getOrder()
    {
        return 2;
    }
}