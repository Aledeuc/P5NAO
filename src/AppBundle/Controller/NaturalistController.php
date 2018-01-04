<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class NaturalistController extends Controller
{
    // Naturalist profil

    /**
     * @Route("/naturalist/tovalidate", name="profil_naturalist_tovalidate")
     * @Security("has_role('ROLE_NATURALIST')")
     */
    public function tovalidateAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $observation = $repository->findBy(array(
            'observationStatus' => '2'
        ));

        $titleTable = 'Observation à valider';

        return $this->render('profil/naturalist.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/historical", name="profil_naturalist_historical")
     * @Security("has_role('ROLE_NATURALIST')")
     */
    public function historicalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $naturalistId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '3',
            'naturalistId' => $naturalistId
        ));

        $titleTable = 'Historique';

        return $this->render('profil/naturalistHistory.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/myrefusal", name="profil_naturalist_myrefusal")
     * @Security("has_role('ROLE_NATURALIST')")
     */
    public function myrefusalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $naturalistId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '4',
            'naturalistId' => $naturalistId
        ));

        $titleTable = 'Observations refusées';

        return $this->render('profil/naturalistHistory.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
}

