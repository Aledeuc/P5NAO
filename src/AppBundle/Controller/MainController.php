<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/index.html.twig', []);
    }

    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualiteAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite');
        $actualite = $repository->findAll();

        return $this->render('main/actualite.html.twig', ['actualite' => $actualite]);
    }

    /**
     * @Route("/aPropos", name="aPropos")
     */
    public function aProposAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/aPropos.html.twig', []);
    }

    /**
     * @Route("/mentions", name="mentions")
     */
    public function mentionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/mentions.html.twig', []);
    }
    /**
     * @Route("/carte", name="carte")
     */
    public function carteAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('main/carte.html.twig', [
            'map_api_key' => $this->getParameter('map_api_key')
        ]);
    }

}