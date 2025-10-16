<?php

namespace App\Form;

use App\Entity\Animals;
use App\Entity\Familiy;
use App\Entity\genus;
use App\Entity\MedicalBooklet;
use App\Entity\menu;
use App\Entity\orders;
use App\Entity\species;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('gender')
            ->add('origin')
            ->add('birth_date', null, [
                'widget' => 'single_text',
            ])
            ->add('arriving_date', null, [
                'widget' => 'single_text',
            ])
            ->add('comment')
            ->add('family_id', EntityType::class, [
                'class' => Familiy::class,
                'choice_label' => 'id',
            ])
            ->add('genus', EntityType::class, [
                'class' => genus::class,
                'choice_label' => 'id',
            ])
            ->add('species', EntityType::class, [
                'class' => species::class,
                'choice_label' => 'id',
            ])
            ->add('orders', EntityType::class, [
                'class' => orders::class,
                'choice_label' => 'id',
            ])
            ->add('parent', EntityType::class, [
                'class' => animals::class,
                'choice_label' => 'id',
            ])
            ->add('medical_booklet', EntityType::class, [
                'class' => MedicalBooklet::class,
                'choice_label' => 'id',
            ])
            ->add('menu', EntityType::class, [
                'class' => menu::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => animals::class,
        ]);
    }
}
