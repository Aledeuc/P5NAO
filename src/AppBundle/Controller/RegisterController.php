<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\UserAdmin;
use AppBundle\Form\RegistrationType;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegisterController
 * @package AppBundle\Controller
 * @Route("/register")
 */
class RegisterController extends BaseController
{
    public function registerAction(Request $request)
    {

        $user = new UserAdmin();

        $form = $this->createForm(RegistrationType::class,$user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {


        }
        else
        {
            return false;
        }


        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}