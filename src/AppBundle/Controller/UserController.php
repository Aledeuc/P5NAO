<?php
/**
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Form\AddArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends Controller
{
    /**
     * @Route("/user/all", name="profil_user_all")
     * @Security("has_role('ROLE_USER')")
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId = $this->getUser()->getId();
        $userLastName = $this->getUser()->getlastName();
        $userFirstName = $this->getUser()->getfirstName();
        $author = "$userLastName $userFirstName";

        $observation = $repository->findBy(array(
            'user' => $userId
        ));

        $titleTable = 'Toutes mes observations';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
    /**
     * @Route("/user/draftcopy", name="profil_user_draftcopy")
     * @Security("has_role('ROLE_USER')")
     */
    public function draftcopyAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '1',
            'user' => $userId
        ));

        $titleTable = 'Brouillon';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/validated", name="profil_user_validated")
     * @Security("has_role('ROLE_USER')")
     */
    public function validatedAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '3',
            'user' => $userId
        ));

        $titleTable = 'Observations Validées';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/inprogress", name="profil_user_inprogress")
     * @Security("has_role('ROLE_USER')")
     */
    public function inprogressAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '5',
            'user' => $userId
        ));

        $titleTable = 'En cours de validation';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/rejected", name="profil_user_rejected")
     * @Security("has_role('ROLE_USER')")
     */
    public function rejectedAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId = 'alexorac';

        $observation = $repository->findBy(array(
            'observationStatus' => '4',
            'user' => $userId
        ));

        $titleTable = 'Observations refusées';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
}

