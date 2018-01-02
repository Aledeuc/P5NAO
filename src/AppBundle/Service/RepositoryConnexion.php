<?php

// src/AppBundle/Service/RepositoryConnexion.php

namespace AppBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class RepositoryConnexion extends Controller
{
    public function getRepository($NameOfRepository)
    {
        var_dump($NameOfRepository);

        $repository = $this->getDoctrine()->getManager()->getRepository($NameOfRepository);

        return $repository;
    }
}