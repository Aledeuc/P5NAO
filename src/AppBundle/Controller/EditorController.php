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
        $actualite = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Actualite')
            ->findBy(array(), array('id' => 'desc'));



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
        $userLastName = $this->getUser()->getlastName();
        $userFirstName = $this->getUser()->getfirstName();
        $author = "$userLastName $userFirstName";

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $actuality->setActualiteAuthor($author);

            if (isset($_POST['publish']))
            {
                $actuality->setActualiteStatus(2);

            }
            elseif (isset($_POST['draft']))
            {
                $actuality->setActualiteStatus(1);
            }
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($actuality);
            $em->flush();

            return $this->redirect($this->generateUrl('profil_editor_allarticle'));
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

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $actualite = $form->getData();
            $actualite->setActualiteStatus(2);
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($actualite);
            $em->flush();
            $this->addFlash('success', 'Actualité mise à jours!');
            return $this->redirectToRoute('profil_editor_allarticle');
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
        return $this->redirectToRoute('profil_editor_allarticle');
    }


    /**
     * @Route("/editor/draft/{id}/article", name="editor_article_draft")
     * @Security("has_role('ROLE_EDITOR')")
     */
    public function draftArticleAction(Actualite $id)
    {
        if (!$id)
        {
            throw $this->createNotFoundException('Pas d\'article trouvée');
        }
        $em = $this->getDoctrine()
            ->getEntityManager();
        $this->setActualiteStatus('1');
        $em->remove($id);
        $em->flush();

        $this->addFlash('success', 'Article enregistré dans brouillon.');
        return $this->redirectToRoute('profil_editor_allarticle');
    }

}

