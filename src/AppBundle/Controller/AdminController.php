<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\UserAdmin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends Controller
{

    /**
     * @Route("/admin/alluser", name="profil_admin_alluser")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function alluserAction()
    {

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserAdmin');

        $user = $repository->findAll();
        return $this->render('profil/adminUser.html.twig', ['user' => $user]);

    }

    /**
     * @Route("/admin/statistical", name="profil_admin_statistical")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function statisticalAction()
    {
        // inscrit
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserAdmin');
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
     * @Route("/admin/reporting", name="profil_admin_reporting")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function reportingAction()
    {

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserAdmin');

        $user = $repository->findByreportingUser(1);

        return $this->render('profil/adminReporting.html.twig', ['user' => $user]);

    }

    /**
     * @Route("/admin/delete/{id}/User", name="admin_user_delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteUserAction(UserAdmin $id)
    {
        if (!$id)
        {
            throw $this->createNotFoundException('Pas d\'utilisateur trouvé');
        }
        $em = $this->getDoctrine()
            ->getEntityManager();
        $em->remove($id);
        $em->flush();

        $user = $em->getRepository('AppBundle:UserAdmin')
            ->findAll();

        $this->addFlash('success', 'Utilisateur supprimé.');
        return $this->render('profil/adminUser.html.twig', ['user' => $user]);
    }

}

