<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends Controller
{
    // Profil user

    /**
     * @Route("/user/all", name="all")
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
            'user' => 'alexorac'
        ));

        $titleTable = 'Toutes mes observations';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
    /**
     * @Route("/user/draftcopy", name="draftcopy")
     */
    public function draftcopyAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '1',
                'user' => 'alexorac'
            )
        );

        $titleTable = 'Brouillon';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/validated", name="validated")
     */
    public function validatedAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '3',
                'user' => 'alexorac'
            )
        );

        $titleTable = 'Observations Validées';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/inprogress", name="inprogress")
     */
    public function inprogressAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '5',
                'user' => 'alexorac'
            )
        );

        $titleTable = 'En cours de validation';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/rejected", name="rejected")
     */
    public function rejectedAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '4',
                'user' => 'alexorac'
            )
        );

        $titleTable = 'Observations refusées';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    // Naturalist profil

    /**
     * @Route("/naturalist/tovalidate", name="tovalidate")
     */
    public function tovalidateAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '2'
            )
        );

        $titleTable = 'Observation à valider';

        return $this->render('profil/naturalist.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/historical", name="historical")
     */
    public function historicalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '3',
                'validation' => 'alexorac'
            )
        );

        $titleTable = 'Historique';

        return $this->render('profil/naturalist.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/myrefusal", name="myrefusal")
     */
    public function myrefusalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');

        $observation = $repository->findBy(array(
                'status' => '4',
                'validation' => 'alexorac'
            )
        );

        $titleTable = 'Observations refusées';

        return $this->render('profil/naturalist.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    //

    /**
     * @Route ("/observation", name="observation")
     */

    public function observationAction()
    {
        return $this->render('main/index.html.twig', []);
    }
}

