<?php

namespace App\Form;

use App\Entity\Meteo;
use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MeteoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('temps')
            ->add('degres')
            ->add('fk_meteo', EntityType::class, array(
                'class'=> Ville::class,
                'choice_label'=> 'nom',
                'multiple' =>false,
                'expanded' =>true,
            ))
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Meteo::class,
        ]);
    }
}
