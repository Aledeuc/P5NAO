<?php
/**
 * Created by PhpStorm.
 * User: lOÏC RODRIGUEZ
 * Date: 16/12/2017
 * Time: 12:12
 */

namespace AppBundle\EventListener;


use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class RegistrationListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {

        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        );


    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $roles = array('ROLE USER');

        $user = $event->getForm()->getData();
        $user->setRoles($roles);

    }
}