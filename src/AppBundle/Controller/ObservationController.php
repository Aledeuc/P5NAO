<?php
/**
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Observation;
use AppBundle\Entity\Taxref;
use AppBundle\Form\Type\AddObservationType;
use AppBundle\Form\Type\ImageObservationType;
use AppBundle\Services\ObservationManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ObservationController extends Controller
{
    /**
     * @param Request $request
     * @param ObservationManager $observationManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="addObservation")
     * @Method({"GET","POST"})
     */
    public function addAction(Request $request)
    {
        /**
        * if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')){
        *     throw $this->createAccessDeniedException('Vous devez être connecté pour ajouter une observation');
        * }
        */
        $observation = new Observation();


        $classe = $this->getDoctrine()->getManager()->getRepository('AppBundle:Taxref')->findOneBy(array('classe' => 'aves'));

        //$observation->setTaxrefs($test);

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