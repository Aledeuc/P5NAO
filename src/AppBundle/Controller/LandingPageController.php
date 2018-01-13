<?php
/**
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * @Route("/nao", name="llandingPage")
     */
    public function landingPageAction(Request $request)
    {
        return $this->render('landingPage/landingPage.html.twig', array(
        ));
    }
}