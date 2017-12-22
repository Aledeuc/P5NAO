<?php
/**
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxrefObservationType extends AbstractType
{
    public function buidForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('famille', TextType::class, [
                'label'=> 'Famille'
            ])
            ->add('cdNom', TextType::class,[
                'label'=>'Nom'
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array(
            'data_class' => 'AppBundle\Entity\Taxref'
        ));
    }
}