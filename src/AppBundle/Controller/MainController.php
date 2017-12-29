<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('main/index.html.twig', []);
    }

    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualiteAction(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite');
        $actualite = $repository->findAll();

        return $this->render('main/actualite.html.twig', ['actualite' => $actualite]);

        // replace this example code with whatever you need
        return $this->render('main/actualite.html.twig', []);

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
     * @Route("/carte", name="carte")
     */
    public function carteAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('main/carte.html.twig', [
            'map_api_key' => $this->getParameter('map_api_key')
        ]);
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
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('main/admin.html.twig');
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_NATURALIST')) {
            return $this->render('main/naturalist.html.twig');
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_EDITOR')) {
            return $this->render('main/editor.html.twig');
        }
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('main/client.html.twig');
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