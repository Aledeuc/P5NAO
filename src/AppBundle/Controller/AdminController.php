<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AdminController extends Controller
{

    /**
     * @Route("/admin/alluser", name="alluser")
     */
    public function alluserAction()
    {

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');

        $user = $repository->findAll();



       /* $userSpeciality = $user['speciality'];
        var_dump($user);
        exit;


        switch ($userSpeciality)
        {
            case 1:
                $userSpeciality = "Utilisateur";
                break;
            case 2:
                $userSpeciality = "Naturaliste";
                break;
            case 3:
                $userSpeciality = "Rédacteur";
                break;
            case 4:
                $userSpeciality = "Administrateur";
                break;
        }

       , 'userSpeciality' => $userSpeciality*/

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
            ->getRepository('AppBundle:User');
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
            ->getRepository('AppBundle:Observation');
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

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User');

        $user = $repository->findByreportingUser(1);

        return $this->render('profil/adminReporting.html.twig', ['user' => $user]);

    }


    /**
     * @Route("/admin/delete/{id}/User", name="admin_user_delete")
     */
    public function deleteUserAction(User $id)
    {
        if (!$id) {
            throw $this->createNotFoundException('Pas d\'utilisateur trouvé');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();

        $user = $em->getRepository('AppBundle:User')->findAll();

        $this->addFlash('success', 'Utilisateur supprimé.');
        return $this->render('profil/adminUser.html.twig', ['user' => $user]);
    }


}
