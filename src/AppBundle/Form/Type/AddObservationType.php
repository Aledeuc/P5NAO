<?php
/**
 */

namespace AppBundle\Form\Type;

use AppBundle\AppBundle;
use AppBundle\Entity\Observation;
use AppBundle\Entity\Taxref;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddObservationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('observationDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['class' => 'form-control datepicker']
            ])
            ->add('taxref', EntityType::class, [
                'class' => Taxref::class,
                'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.famille', 'ASC');
                },
                'choice_label' => 'famille',
            ])
            ->add('observationNumber', IntegerType::class)
            ->add('observationLatitude', NumberType::class, [
                'attr' => ['placeholder' => 'latitude']
            ])
            ->add('observationLongitude', NumberType::class, [
                'attr' => ['placeholder' => 'longitude']
            ])
            ->add('observationEnvironment', ChoiceType::class, [
                'label' => 'cadre',
                'choices' => array(
                    'Ville' => Observation::ENVIRONMENT_CITY,
                    'Forêt' => Observation::ENVIRONMENT_FOREST,
                    'Jardin' => Observation::ENVIRONMENT_GARDEN,
                    'Lac' => Observation::ENVIRONMENT_LAKE,
                    'Mer' => Observation::ENVIRONMENT_SEA,
                    'Montagne' => Observation::ENVIRONMENT_MOUNTAIN,
                ),
                'attr' => [
                    'class' => 'mdb-select',
                ],
            ])
            ->add('observationClimat', ChoiceType::class, [
                'label' => 'climat',
                'choices' => array(
                    'Soleil' => Observation::CLIMATE_SUN,
                    'Soleil et nuage' => Observation::CLIMATE_SUNCLOUD,
                    'Nuageux' => Observation::CLIMATE_CLOUD,
                    'Pluie' => Observation::CLIMATE_RAIN,
                    'Neige' => Observation::CLIMATE_SNOW,
                ),
                'attr' => ['class' => 'mdb-select',
                ],
            ])
            ->add('observationImages', ImageObservationType::class )
            ->add('observationComment', TextareaType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Observation'
        ));
    }
}