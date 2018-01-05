<?php
/**
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\Newsletter;
use AppBundle\Entity\Observation;

use AppBundle\Entity\Taxref;
use AppBundle\Form\SubscribeNewsletterType;
use AppBundle\Form\Type\SearchObservationType;
use AppBundle\Service\ObservationManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class MainController extends Controller
{
    /**
     * @param SessionInterface $session
     * @param Request $request
     * @param ObservationManager $observationManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * * @Route("/", name="homepage")
     */
    public function indexAction(SessionInterface $session, Request $request, ObservationManager $observationManager)
    {
        if (empty($session->get('observation'))) {
            $observation = $observationManager->createObservation();
        } else {
            $observation = $session->get('observation');
        }
        //Observation
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $observationList = $repository->findAll(array(
            'taxref' => 1,
        ));


        $form = $this->createForm(SearchObservationType::class, $observation);
        $form->handleRequest($request);

        // Map
        if ($form->isSubmitted() && $form->isValid()) {
            //$data = $this->get('serializer')->serialize($observation, 'json');
            //$data = json_encode($observation);
            //$response = new Response($data);
            //$response->headers->set('Content-Type', 'application/json');

            //mettre observations en session
            $session->set('observation', $observation);
            return $this->redirectToRoute('homepage');

        }

        // replace this example code with whatever you need
        return $this->render('main/index.html.twig', [
            'map_api_key' => $this->getParameter('map_api_key'),
            'observationList' => $observationList,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualiteAction(Request $request)
    {

        $actualite = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite')
            ->findBy(array('actualiteStatus' => '2'), array('id' => 'desc'));

        return $this->render('main/actualite.html.twig', ['actualite' => $actualite]);

    }

    /**
     * @Route("/article/{id}/", name="actualite_article_view")
     */
    public function articleviewAction(Actualite $id)
    {
        if (!$id)
        {
            throw $this->createNotFoundException('Pas d\'article trouvée');
        }

        $actualite = $this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle:Actualite')
        ->findOneById($id);

        return $this->render('main/article.html.twig', ['actualite' => $actualite]);
    }


    /**
     * @Route("/aPropos", name="aPropos")
     */
    public function aProposAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/aPropos.html.twig', []);
    }

    /**
     * @Route("/mentions", name="mentions")
     */
    public function mentionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/mentions.html.twig', []);
    }


    /**
     * @Route("/newsletter", name="subscribe_newsletter")
     */
    public function newsletterAction(Request $request)
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(SubscribeNewsletterType::class , $newsletter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($newsletter);
            $em->flush();

            return $this->redirect($this->generateUrl('profil_editor_allarticle'));
        }

        return $this->render('main/index.html.twig', []);

    }

    /**
     * @Route("/admin/", name="admin")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/admin.html.twig', []);
    }

    /**
     * @Route("/client", name="client")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function clientAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/client.html.twig', []);
    }

    /**
     * @Route("/naturalist", name="naturalist")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function naturalistAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/naturalist.html.twig', []);
    }

    /**
     * @Route("/editor", name="editor")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function editorAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/editor.html.twig', []);
    }


    /**
     * @Route("/user", name="user_info")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function showUserAction()
    {
        $observationRepository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $actualiteRepository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite');

        $userRepository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserAdmin');


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $user = $userRepository->findAll();
            return $this->render('profil/adminUser.html.twig',['user' => $user]);
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_NATURALIST')) {
            $observation = $observationRepository->findBy(array(
                    'observationStatus' => '2'
                ));
            $titleTable = 'Observation à valider';
            return $this->render('profil/naturalist.html.twig',['observation' => $observation,'titleTable' => $titleTable]);
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_EDITOR')) {
            $actualite = $actualiteRepository->findAll();
            return $this->render('profil/editor.html.twig',['actualite' => $actualite]);
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $titleTable = 'Toutes mes observations';
            $userId= 'alexorac';

            $observation = $observationRepository->findBy(array(
                'user' => $userId
            ));

            return $this->render('profil/user.html.twig',['observation' => $observation, 'titleTable' => $titleTable]);
        }
    }

    /**
     * @Route("/who-is-user", name="user_question")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function determineUser()
    {
        return $this->render('main/user.html.twig', []);
    }

}