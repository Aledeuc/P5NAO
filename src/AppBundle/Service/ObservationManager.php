<?php
/**
 */

namespace AppBundle\Service;

use AppBundle\Entity\Observation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ObservationManager
{
    private $session;
    private $em;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session  = $session;
        $this->em       = $entityManager;
    }

    public function createObservation(){
        $observation = new Observation();
        return $observation;
    }

    public function getObservationInSession()
    {
        $observation = $this->session->get('observation');
        return $observation;
    }

    public function setObservationInSession(Observation $observation)
    {
        $this->session->set('observation', $observation);
    }
}