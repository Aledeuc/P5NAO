<?php


namespace AppBundle\Form;

use AppBundle\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;


class AddArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actualiteTitle', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'TITRE',
                )))
            ->add('actualiteArticle',  CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'language' => 'fr',
                    //...
                ),
            ))
            ->add('actualiteDate', DateType::class, array(
                'label' => false,
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ))
            ->add('actualiteCategory', ChoiceType::class , array(
                'label' => false,
                'placeholder' => 'catégorie',
                'choices' => array(
                    'cat1' => '1',
                    'cat2' => '2',
                )
            ))
            ->add('actualiteImages',  FileType::class, array(
                'label' => false))
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Actualite::class,
        ));
    }
}