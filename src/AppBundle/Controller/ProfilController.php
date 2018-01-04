<?php
/**
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProfilController extends Controller
{

    /**
     * @Route ("/observation", name="observation")
     */

    public function observationAction()
    {
        return $this->render('main/index.html.twig', []);
    }

    /**
     * @Route ("/pageTest", name="pageTest")
     */

    public function pageTestAction()
    {
        return $this->render('main/index.html.twig', []);
    }
}

