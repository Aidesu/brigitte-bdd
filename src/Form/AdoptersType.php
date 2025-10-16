<?php

namespace App\Form;

use App\Entity\Adopters;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdoptersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firth_name')
            ->add('last_name')
            ->add('address')
            ->add('country')
            ->add('city')
            ->add('zip_code')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adopters::class,
        ]);
    }
}
