<?php
/**
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\AddObservationType;
use AppBundle\Services\ObservationManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ObservationController extends Controller
{
    /**
     * @Route("/add", name="addObservation")
     */
    public function addAction(Request $request, ObservationManager $observationManager)
    {
        $observation = $observationManager->createObservation();

        $form = $this->createForm(AddObservationType::class, $observation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $observation = $form->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($observation);
             $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('observation/add.html.twig', array(
            'form'=> $form->createView()
        ));
    }
}