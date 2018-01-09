<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

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

            ->add('imageName', FileType::class, array(
                'required' => false,
                'label' => 'Mon dossier de naturaliste',
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


        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'appbundle_user_registration';
    }

}

