<?php
/**
 * Created by PhpStorm.
 * User: lOÏC RODRIGUEZ
 * Date: 02/01/2018
 * Time: 19:56
 */

namespace AppBundle\Controller;

use AppBundle\Entity\TaxrefFile;
use AppBundle\Entity\TaxrefLienFile;
use AppBundle\Form\TaxrefFileType;
use AppBundle\Form\TaxrefLienFileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaxrefController
{
    /**
     * @Route("/taxref/charger", name="upload_taxref")
     *
     */
    public function showUploadFormsAction()
    {
        $taxrefFile = new TaxrefFile();
        $taxrefForm = $this->createForm(TaxrefFileType::class, $taxrefFile);

        $taxrefLienFile = new TaxrefLienFile();
        $taxrefLienForm = $this->createForm(TaxrefLienFileType::class, $taxrefLienFile);

        return $this->render('admin/taxref/upload.html.twig', array(
            'taxrefForm' => $taxrefForm->createView(),
            'taxrefLienForm' => $taxrefLienForm->createView()
        ));
    }

    /**
     * @Route("/taxref/charger/taxref", name="upload_taxref_taxref")
     */
    public function uploadTaxrefAction(Request $request)
    {
        $taxrefFile = new TaxrefFile();
        $taxrefForm = $this->createForm(TaxrefFileType::class, $taxrefFile);

        $taxrefForm->handleRequest($request);
        if ($taxrefForm->isSubmitted() && $taxrefForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($taxrefFile);
            $em->flush();
            // Rechargement de la table à partir du dernier fichier uploadé
            $success = $this->get('app.reload_taxref')->reloadTaxref();

            if ($success){
                $this->addFlash('info', 'La table taxref a bien été mise à jour.');
            } else {
                $this->addFlash('error', 'Le fichier entré pour recharger la table est incorrect.');
            }
            return $this->redirectToRoute('upload_taxref');
        }

        $this->addFlash('error', 'Le fichier doit être renseigné au format csv pour recharger la table.');
        return $this->redirectToRoute('upload_taxref');
    }

    /**
     * @Route("/taxref/charger/taxreflink", name="upload_taxref_taxreflink")
     */
    public function uploadTaxreflinkAction(Request $request)
    {
        $taxrefLinkFile = new TaxrefLienFile();
        $taxrefLinkForm = $this->createForm(TaxrefLienFileType::class, $taxrefLinkFile, array(
            'action' => $this->generateUrl('upload_taxref_taxreflink')
        ));

        $taxrefLinkForm->handleRequest($request);
        if ($taxrefLinkForm->isSubmitted() && $taxrefLinkForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($taxrefLinkFile);
            $em->flush();
            // Rechargement de la table à partir du dernier fichier uploadé
            $success = $this->get('app.reload_taxref_link')->reloadTaxrefLink();

            if ($success){
                $this->addFlash('info', 'La table taxref a bien été mise à jour.');
            } else {
                $this->addFlash('error', 'Le fichier entré pour recharger la table est incorrect.');
            }
            return $this->redirectToRoute('upload_taxref');
        }

        $this->addFlash('error', 'Le fichier doit être renseigné au format csv pour recharger la table.');
        return $this->redirectToRoute('upload_taxref');
    }

}