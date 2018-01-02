<?php
/**
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Form\AddArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class EditorController extends Controller
{
    // editor profil

    /**
     * @Route("/editor/allarticle", name="profil_editor_allarticle")
     * @Security("has_role('ROLE_EDITOR')")
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
     * @Route("/editor/addarticle", name="profil_editor_addarticle")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function addarticleAction(Request $request)
    {
        $actuality = new Actualite();
        $form = $this->createForm(AddArticleType::class , $actuality);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $naturalistId = 'alexorac';
            $actuality->setActualiteAuthor($naturalistId);
            $actuality->setActualiteStatus(2);

            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($actuality);
            $em->flush();

            return $this->redirect($this->generateUrl('allarticle'));
        }

        return $this->render('profil/editorAddArticle.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/editor/update/{id}/article", name="editor_article_update")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function updateArticleAction(Request $request, Actualite $actualite)
    {
        $form = $this->createForm(AddArticleType::class , $actualite);
        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $actualite = $form->getData();
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($actualite);
            $em->flush();
            $this->addFlash('success', 'Actualité updated!');
            return $this->redirectToRoute('allarticle');
        }
        return $this->render('profil/editorUpdateArticle.html.twig', ['form' => $form->createView() , 'actualite' => $actualite]);
    }

    /**
     * @Route("/editor/delete/{id}/article", name="editor_article_delete")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function deleteArticleAction(Actualite $id)
    {
        if (!$id)
        {
            throw $this->createNotFoundException('Pas d\'article trouvée');
        }
        $em = $this->getDoctrine()
            ->getEntityManager();
        $em->remove($id);
        $em->flush();

        $this->addFlash('success', 'Article supprimé.');
        return $this->redirectToRoute('allarticle');
    }

}

