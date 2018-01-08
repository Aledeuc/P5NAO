<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'label' => 'Prénom :',
                'constraints' => array(
                    new Length(array(
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le prénom doit faire au moins {{ limit }} caractères',
                        'maxMessage' => 'Le prénom doit faire moins de {{ limit }} caractères'
                    )),
                    new NotBlank(array(
                        'message' => 'Vous devez indiquer un prénom'
                    ))
                )
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Nom :',
                'constraints' => array(
                    new Length(array(
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le nom doit faire au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom doit faire moins de {{ limit }} caractères'
                    )),
                    new NotBlank(array(
                        'message' => 'Vous devez indiquer un nom'
                    ))
                )
            ))
            ->add('imageFile', FileType::class, array(
                'required' => false,
                'label' => 'Photo de profil :',
                'constraints' => array(
                    new Image()
                )
            ))
            ->add('organization', TextType::class, array(
                'label' => 'Faites-vous parti d\'une association / entreprise / collectivité locale qui oeuvre pour la nature ? Si oui, indiquez son nom :',
                'constraints' => array(
                    new Length(array(
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Ce champ doit faire plus de {{ limit }} caractères',
                        'maxMessage' => 'Ce champ doit faire moins de {{ limit }} caractères'
                    ))
                )
            ))
            ->add('observationFrequency', ChoiceType::class, array(
                'label' => 'Votre fréquence d\'observation des oiseaux :',
                'placeholder' => 'Choisir',
                'choices' => array(
                    'Tous les jours' => 'Tous les jours',
                    'Toutes les semaines' => 'Toutes les semaines',
                    'Tous les mois' => 'Tous les mois',
                    'Tous les 3 mois' => 'Tous les 3 mois',
                    'Tous les 6 mois' => 'Tous les 6 mois',
                    'Tous les ans' => 'Tous les ans'
                )
            ))
            ->add('speciality', TextType::class, array(
                'label' => 'Êtes-vous spécialisé dans une famille d\'oiseaux ? Si oui, indiquez laquelle :',
                'constraints' => array(
                    new Length(array(
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Ce champ doit faire plus de {{ limit }} caractères',
                        'maxMessage' => 'Ce champ doit faire moins de {{ limit }} caractères'
                    ))
                )
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Modifier mon email :',
                'constraints' => array(
                    new Email(array(
                        'message' => 'Vous devez entrer une adresse email valide.',
                        'checkMX' => true
                    )),
                    new NotBlank(array(
                        'message' => 'Vous devez indiquer une adresse email'
                    ))
                )
            ))
            ->add('plainPassword', PasswordType::class, array(
                'label' => 'Modifier mon mot de passe :',
                'constraints' => array(
                    new Length(array(
                        'min' => 3,
                        'max' => 30,
                        'minMessage' => 'Le mot de passe doit faire plus de {{ limit }} caractères',
                        'maxMessage' => 'Le mot de passe doit faire moins de {{ limit }} caractères'
                    ))
                )
            ))
            ->add('isNewsletterSubscriber', CheckboxType::class, array(
                'label' => 'Recevoir la newsletter',
                'required' => false
            ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}