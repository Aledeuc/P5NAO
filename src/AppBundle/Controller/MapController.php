<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MapController extends Controller
{
    /**
     * @Route("/map", name="map")
     */
    public function mapAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('map/map.html.twig', [
            'map_api_key' => $this->getParameter('map_api_key')
        ]);
    }
}