<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;

class LoadFixtures implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/Resources/fixtures.yml',
            $manager,
            [
               'providers' => [$this]
            ]
        );
    }

    public function cdNames()
    {
        $genera = [441604, 645315, 698711, 441605, 432708, 459459, 441606, 418715, 459626, 2763, 2765, 459616,
            645631, 1973, 550537, 456607, 550538, 1948, 1958, 199302, 1961, 1960, 2708, 2706, 441860, 441861, 432699, 829197,
            441862, 2398, 2399, 2788, 199311, 813532, 2820, 1953, 1955, 1950, 2794, 2828, 2826, 2785, 2783, 199307, 2786,
            418712, 1964, 836226, 2007, 2005, 2781, 2779, 1970, 1972, 1962, 836223, 1975, 1977, 836222, 2772, 2773, 2770,
            2769, 2767, 441641, 780302, 3590, 441612];

        $key = array_rand($genera);
        return $genera[$key];
    }

    public function departments()
    {
        $genera = array(
            "Ain", "Aisne", "Allier", "Alpes de Haute Provence", "Hautes Alpes",
            "Alpes Maritimes", "Ardèche", "Ardennes", "Ariège", "Aube", "Aude",
            "Aveyron", "Bouches du Rhône", "Calvados", "Cantal", "Charente",
            "Charente Maritime", "Cher", "Corrèze", "Corse du Sud", "Haute-Corse",
            "Côte d'Or", "Côtes d'Armor", "Creuse", "Dordogne", "Doubs",
            "Drôme", "Eure", "Eure et Loir", "Finistère", "Gard", "Haute Garonne", "Gers",
            "Gironde", "Hérault", "Ille et Vilaine", "Indre", "Indre et Loire",
            "Isère", "Jura", "Landes", "Loir et Cher", "Loire", "Haute Loire", "Loire Atlantique",
            "Loiret", "Lot", "Lot et Garonne", "Lozère", "Maine et Loire", "Manche", "Marne",
            "Haute Marne", "Mayenne", "Meurthe et Moselle", "Meuse", "Morbihan", "Moselle", "Nièvre",
            "Nord", "Oise", "Orne", "Pas de Calais", "Puy de Dôme", "Pyrénées Atlantiques", "Hautes Pyrénées",
            "Pyrénées Orientales", "Bas Rhin", "Haut Rhin", "Rhône", "Haute Saône", "Saône et Loire", "Sarthe",
            "Savoie", "Haute Savoie", "Paris", "Seine Maritime", "Seine et Marne", "Yvelines", "Deux Sèvres",
            "Somme", "Tarn", "Tarn et Garonne", "Var", "Vaucluse", "Vendée", "Vienne", "Haute Vienne",
            "Vosges", "Yonne", "Territoire de Belfort", "Essonne", "Hauts de Seine", "Seine Saint Denis",
            "Val de Marne", "Val d'Oise", "Guadeloupe", "Martinique", "Guyane", "Réunion", "Saint Pierre et Miquelon", "Mayotte");

        $key = array_rand($genera);
        return $genera[$key];
    }

    public function latitudeFrance()
    {
        return $this->frand(43, 50, 6); // Latitude de la france environ entre 43 et 50
    }

    public function longitudeFrance()
    {
        return $this->frand(-1, 6, 6); // Longitude de la france environ entre -1 et 6
    }

    public function status()
    {
        $genera = array(
            "20", "30");

        $key = array_rand($genera);
        return $genera[$key];
    }

    public function sex()
    {
        $genera = array(
            "male", "femelle", "inconnu");

        $key = array_rand($genera);
        return $genera[$key];
    }

    // Méthode de randomisation de chiffres à virgule
    private function frand($min, $max, $decimals = 0) {
        $scale = pow(10, $decimals);
        return mt_rand($min * $scale, $max * $scale) / $scale;
    }

    /**
    +     * Get the order of this fixture
    +     * @return integer
    +     */
   public function getOrder()
   {
     return 3;
   }

   /**
    * Upload File Fixture
    */
    public function upload($filename)
    {
        if (is_array($filename)) {
            $filename = \Faker\Provider\Base::randomElement($filename);
        }
        $path = sprintf('./web/tmp/%s', uniqid());
        $copy = copy($filename, $path);
        if (!$copy) {
            throw new \Exception('Copy failed');
        }
        $mimetype = MimeTypeGuesser::getInstance()->guess($path);
        $size     = filesize($path);
        $imageFile = new UploadedFile($path, $filename, $mimetype, $size, null, true);
        return $imageFile;
    }
}