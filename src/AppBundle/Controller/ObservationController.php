<?php
/**
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Observation;
use AppBundle\Form\Type\AddObservationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ObservationController extends Controller
{
    /**
     * @param Request $request
     * @Route("/add", name="addObservation")
     *
     */
    public function addAction(Request $request)
    {
        $observation = new Observation();

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