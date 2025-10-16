<?php

namespace App\Form;

use App\Entity\Aisle;
use App\Entity\Cage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CageType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('number')
->add('surface')
->add('capacity')
->add('aisle', EntityType::class, [
'class' => Aisle::class,
'choice_label' => 'name',
'label' => 'Aisle',
'placeholder' => 'Select aisle',
'required' => true,
]);
}

public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Cage::class,
]);
}
}
