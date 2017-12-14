<?php

// src/Service/RepositoryConnexion.php

namespace AppBundle\Service;

class RepositoryConnexion
{
    public function getRepository($NameOfRepository)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository($NameOfRepository);

        return $repository;
    }
}