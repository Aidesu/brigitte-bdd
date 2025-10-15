<?php

namespace App\Form;

use App\Entity\Diseases;
use App\Entity\Vaccines;
use App\Entity\MedicalBooklet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicalBookletType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vaccine_date')
            ->add('vaccine_next_day')
            ->add('disease', EntityType::class, [
                'class' => Diseases::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('vaccine', EntityType::class, [
                'class' => Vaccines::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MedicalBooklet::class,
        ]);
    }
}
