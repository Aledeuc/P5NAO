<?php


namespace AppBundle\Form;

use AppBundle\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                'label' => false,
                'config' => array(
                    'uiColor' => '#ffffff',
                    'language' => 'fr',
                )
            ))
            ->add('actualiteDate', DateType::class, array(
                'label' => false,
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'form-control datepicker'],
            ))
            ->add('actualiteCategory', ChoiceType::class, array(
                'label' => false,
                'choices'  => array(
                    'cat1' => 'category 1',
                    'cat2' => 'category 2',
                    'cat3' => 'category 3',
                ),
                'attr' =>['class' => 'mdb-select'],
            ))
            ->add('actualiteImages',  FileType::class, array(
                'label' => false,
                'data_class' => null,
            ))
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Actualite'
        ]);
    }

}