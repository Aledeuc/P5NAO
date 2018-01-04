<?php
/**
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Observation;
use AppBundle\Entity\Taxref;
use AppBundle\Form\Type\AddObservationType;
use AppBundle\Form\Type\ImageObservationType;
use AppBundle\Service\FileUploader;
use AppBundle\Service\ObservationManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class ObservationController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="addObservation")
     * @Method({"GET","POST"})
     */
    public function addAction(Request $request, FileUploader $fileUploader)
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
            //Ajout des données des champs
            $observation->getObservationImages()->setUploadDate(new \DateTime());

            $file = $observation->getObservationImages()->getImageFile();
            $fileName = $fileUploader->upload($file);

            $observation->getObservationImages()->setImageName($fileName);

            $observation->setObservationStatus(Observation::STATUS_VALIDATE);
            $observation->setObservationPublication(Observation::STATUS_VALIDATE);
            $observation->setNaturalistId(null);
            $userId = $this->getUser()->getId();
            $observation->setUser($userId);

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