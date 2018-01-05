<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Form\Type\UpdateObservationType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Observation;


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

        $naturalistId = $this->getUser()->getId();
        $observation = $repository->findBy(array(
            'observationStatus' => array(3,5),
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

        $naturalistId = $this->getUser()->getId();

        $observation = $repository->findBy(array(
            'observationStatus' => '4',
            'naturalistId' => $naturalistId
        ));
        dump($observation);

        $titleTable = 'Observations refusées';

        return $this->render('profil/naturalistHistory.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
    /**
     * @Route("/naturalist/update/{id}/observation", name="naturalist_observation_update")
     * @Security("has_role('ROLE_NATURALIST')")
     */
    public function updateArticleAction(Request $request, Observation $observation)
    {
        $form = $this->createForm(UpdateObservationType::class , $observation);
        $naturalistId = $this->getUser()->getId();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $observation = $form->getData();
            $observation->setnaturalistId($naturalistId);

            if (isset($_POST['publish']))
            {
                if (isset($_POST['archiveCheckbox']))
                {
                    $observation->setobservationStatus(3);
                } else
                {
                    $observation->setobservationStatus(5);
                }
            }
            elseif (isset($_POST['refuse']))
            {
                if (!isset($_POST['signalementCheckbox']))
                {
                    $userId = $observation->getUser();
                    $userRepository = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AppBundle:UserAdmin')
                        ->findOneById($userId);
                    $userRepository->setreportingUser(true);

                }
                $observation->setobservationStatus(4);
                $signalementComment = $_POST['signalementTextarea'];
                $observation->setobservationSignalementComment($signalementComment);
            }

            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($observation);
            $em->flush();
            $em = $this->getDoctrine()
                ->getManager();

            $em->persist($observation);
            $em->flush();



            $this->addFlash('success', 'Observation mise à jours!');
            return $this->redirectToRoute('profil_naturalist_tovalidate');
        }
        return $this->render('profil/naturalistUpdateObservation.html.twig', ['form' => $form->createView() , 'observation' => $observation]);
    }

}

