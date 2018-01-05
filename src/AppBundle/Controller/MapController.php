<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Observation;

class MapController extends Controller
{
    /**
     * @Route("/map", name="map")
     */
    public function mapAction(Request $request)
    {
        $observation = new Observation();
        $observation->setObservationDate(new \DateTime());
        $observation->setObservationLatitude(50.498392);
        $observation->setObservationLongitude(2.610353);

        //$data = $this->get('serializer')->serialize($observation, 'json');
        $data = json_encode($observation);
        //$response = new Response($data);
        //$response->headers->set('Content-Type', 'application/json');

        // replace this example code with whatever you need
        return $this->render('map/map.html.twig', [
            'map_api_key' => $this->getParameter('map_api_key'),
            'data' => $data
        ]);
    }
}