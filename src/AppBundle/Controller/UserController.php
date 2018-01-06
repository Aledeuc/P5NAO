<?php
/**
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\Observation;
use AppBundle\Form\Type\AddObservationType;
use AppBundle\Form\AddArticleType;
use AppBundle\Service\FileUploader;
use AppBundle\Service\ObservationManager;
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

        $userId = $this->getUser()->getId();

        $observation = $repository->findBy(array(
            'observationStatus' => '1',
            'user' => $userId
        ));

        $titleTable = 'Brouillon';

        return $this->render('profil/userDraft.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/draft/{id}/observation", name="user_observation_draft")
     * @Security("has_role('ROLE_USER')")
     */
    public function updateArticleAction(Request $request, FileUploader $fileUploader, Observation $observation)
    {
        if (!$this->get('security.authorization_checker')
            ->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            throw $this->createAccessDeniedException('Vous devez être connecté pour modifier un brouillon');
        }
        $user = $this->getUser();
        $form = $this->createForm(AddObservationType::class , $observation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($observation->getObservationImages() == null)
            {

            } else
            {
                $observation->getObservationImages()
                    ->setUploadDate(new \DateTime());

                $file = $observation->getObservationImages()
                    ->getImageFile();
                $fileName = $fileUploader->upload($file);

                $observation->getObservationImages()
                    ->setImageName($fileName);
            }

            if ($user->hasRole('ROLE_USER'))
            {
                if (isset($_POST['waiting']))
                {
                    $observation->setObservationStatus(Observation::STATUS_WAITING);
                }
                elseif (isset($_POST['draft']))
                {
                    $observation->setObservationStatus(Observation::STATUS_DRAFT);
                }
            }

            $observation = $form->getData();
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($observation);
            $em->flush();
            $titleTable = 'Brouillon';
            return $this->redirectToRoute('profil_user_draftcopy');
        }
        $titleTable = 'Brouillon';
        return $this->render('observation/add.html.twig', ['form' => $form->createView() , 'observation' => $observation, 'titleTable' => $titleTable]);
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

        $userId = $this->getUser()->getId();

        $observation = $repository->findBy(array(
            'observationStatus' => array(3,5),
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

        $userId = $this->getUser()->getId();

        $observation = $repository->findBy(array(
            'observationStatus' => '2',
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

        $userId = $this->getUser()->getId();

        $observation = $repository->findBy(array(
            'observationStatus' => '4',
            'user' => $userId
        ));

        $titleTable = 'Observations refusées';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
}

