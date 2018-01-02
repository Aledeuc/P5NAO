<?php
/**
 */

namespace AppBundle\Form\Type;

use AppBundle\Entity\ObservationImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageObservationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label'=> 'photo'
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array(
            'data_class' => ObservationImage::class
        ));
    }
}