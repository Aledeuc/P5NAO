<?php
/**
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Form\AddArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    // Profil user

    /**
     * @Route("/user/all", name="all")
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId= 'alexorac';

        $observation = $repository->findBy(array(
            'user' => $userId
        ));

        $titleTable = 'Toutes mes observations';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }
    /**
     * @Route("/user/draftcopy", name="draftcopy")
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
            )
        );

        $titleTable = 'Brouillon';

        return $this->render('profil/user.html.twig', ['observation' => $observation, 'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/validated", name="validated")
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
            )
        );

        $titleTable = 'Observations Validées';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/inprogress", name="inprogress")
     */
    public function inprogressAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId ='alexorac';

        $observation = $repository->findBy(array(
                'observationStatus' => '5',
                'user' => $userId
            )
        );

        $titleTable = 'En cours de validation';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/user/rejected", name="rejected")
     */
    public function rejectedAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $userId ='alexorac';

        $observation = $repository->findBy(array(
                'observationStatus' => '4',
                'user' => $userId
            )
        );

        $titleTable = 'Observations refusées';

        return $this->render('profil/user.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    // Naturalist profil

    /**
     * @Route("/naturalist/tovalidate", name="tovalidate")
     */
    public function tovalidateAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $observation = $repository->findBy(array(
                'observationStatus' => '2'
            )
        );

        $titleTable = 'Observation à valider';

        return $this->render('profil/naturalist.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/historical", name="historical")
     */
    public function historicalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $naturalistId ='alexorac';

        $observation = $repository->findBy(array(
                'observationStatus' => '3',
                'naturalistId' => $naturalistId
            )
        );

        $titleTable = 'Historique';

        return $this->render('profil/naturalistHistory.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    /**
     * @Route("/naturalist/myrefusal", name="myrefusal")
     */
    public function myrefusalAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Observation');

        $naturalistId ='alexorac';

        $observation = $repository->findBy(array(
                'observationStatus' => '4',
                'naturalistId' => $naturalistId
            )
        );

        $titleTable = 'Observations refusées';

        return $this->render('profil/naturalistHistory.html.twig', ['observation' => $observation,'titleTable' => $titleTable]);

    }

    // editor profil

    /**
     * @Route("/editor/allarticle", name="allarticle")
     */
    public function allarticleAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite');

        $actualite = $repository->findAll();

        return $this->render('profil/editor.html.twig', ['actualite' => $actualite]);

    }

    /**
     * @Route("/editor/addarticle", name="addarticle")
     */
    public function addarticleAction(Request $request)
    {
        $actuality = new Actualite();
        $form = $this->createForm(AddArticleType::class, $actuality);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $naturalistId ='alexorac';
            $actuality->setActualiteAuthor($naturalistId);
            $actuality->setActualiteStatus(2);

            $em = $this->getDoctrine()->getManager();
            $em->persist($actuality);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'allarticle')
            );
        }

        return $this->render('profil/editorAddArticle.html.twig',array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/editor/update/{id}/article", name="editor_article_update")
     */
    public function updateArticleAction(Request $request, Actualite $actualite)
    {
        $form = $this->createForm(AddArticleType::class, $actualite);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $actualite = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($actualite);
            $em->flush();
            $this->addFlash('success', 'Actualité updated!');
            return $this->redirectToRoute('allarticle');
        }
        return $this->render('profil/editorUpdateArticle.html.twig', [
            'form' => $form->createView(), 'actualite' => $actualite
        ]);
    }


    /**
     * @Route("/editor/delete/{id}/article", name="editor_article_delete")
     */
    public function deleteArticleAction(Actualite $id)
    {
        if (!$id) {
            throw $this->createNotFoundException('Pas d\'article trouvée');
        }
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();


        $this->addFlash('success', 'Article supprimé.');
        return $this->redirectToRoute('allarticle');
    }

    /**
     * @Route ("/observation", name="observation")
     */

    public function observationAction()
    {
        return $this->render('main/index.html.twig', []);
    }

    /**
     * @Route ("/pageTest", name="pageTest")
     */

    public function pageTestAction()
    {
        return $this->render('main/index.html.twig', []);
    }
}

