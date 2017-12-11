<?php
/**
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    /**
     * @Route("/nompremom", name="profil")
     */
    public function profilAction(Request $request)
    {
        // if (userProfil = 1)
            $repository = $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('AppBundle:observation');

            $observation = $repository->findBy(
                array('user' => 'alexorac')
            );


        return $this->render('profil/user.html.twig', ['observation' => $observation]);
        //{ } elseif ( userProfil = 2) {}
        // elseif (userProfil = 3) {}
        // elseif (userProfil = 4) {}
        // else {}

    }


    // Profil user

    /**
     * @Route("/nompremom/brouillon", name="brouillon")
     */
    public function brouillonAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '1', 'user' => 'alexorac')

        );

        return $this->render('profil/user.html.twig', ['observation' => $observation]);

    }


    /**
     * @Route("/nompremom/validees", name="validees")
     */
    public function valideesAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '3', 'user' => 'alexorac')

        );

        return $this->render('profil/user.html.twig', ['observation' => $observation]);

    }

    /**
     * @Route("/nompremom/encours", name="encours")
     */
    public function encoursAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '5', 'user' => 'alexorac')

        );

        return $this->render('profil/user.html.twig', ['observation' => $observation]);

    }

    /**
     * @Route("/nompremom/refusees", name="refusees")
     */
    public function refuseesAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '4', 'user' => 'alexorac')

        );

        return $this->render('profil/user.html.twig', ['observation' => $observation]);

    }



    // Naturaliste profil

    /**
     * @Route("/nompremom/avalider", name="avalider")
     */
    public function avaliderAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '2')

        );

        return $this->render('profil/naturaliste.html.twig', ['observation' => $observation]);

    }

    /**
     * @Route("/nompremom/historique", name="historique")
     */
    public function historiqueAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '3', 'validation'=> 'alexorac')

        );

        return $this->render('profil/naturaliste.html.twig', ['observation' => $observation]);

    }


    /**
     * @Route("/nompremom/mesrefus", name="refusees")
     */
    public function mesrefusAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository( 'AppBundle:observation');

        $observation = $repository->findBy(
            array('status' => '4', 'validation' => 'alexorac')

        );

        return $this->render('profil/naturaliste.html.twig', ['observation' => $observation]);

    }





    //

    /**
     * @Route ("/observation", name="observation")
     */

    public function observationAction()
    {
        return $this->render('main/index.html.twig', []);
    }
}