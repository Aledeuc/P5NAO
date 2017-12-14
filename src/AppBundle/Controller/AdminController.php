<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    /**
     * @Route("/admin/alluser", name="alluser")
     */
    public function alluserAction()
    {

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:user');

        $user = $repository->findAll();

        return $this->render('profil/adminUser.html.twig', ['user' => $user]);

    }

    /**
     * @Route("/admin/statistical", name="statistical")
     */
    public function statisticalAction()
    {
        // inscrit
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:user');
        $allUser = $repository->findAll();
        $countUser = count($allUser);

        // Naturaliste
        $allNaturalist = $repository->findBy(array(
            'speciality' => '2',
        ));
        $countNaturalist = count($allNaturalist);

        // observations
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:observation');
        $allObservation = $repository->findAll();
        $countObservation = count($allObservation);

        // non validés
        $rejectedObservation = $repository->findBy(array(
            'observationStatus' => '4',
        ));

        $countRejected = count($rejectedObservation);

        return $this->render('profil/adminStatistical.html.twig', ['countUser' => $countUser, 'countNaturalist' => $countNaturalist, 'countObservation' => $countObservation, 'countRejected' => $countRejected]);

    }

    /**
     * @Route("/admin/reporting", name="reporting")
     */
    public function reportingAction()
    {
        // if (userProfil = 1)
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:user');

        $user = $repository->findAll();

        return $this->render('profil/adminReporting.html.twig', ['user' => $user]);

    }
}
