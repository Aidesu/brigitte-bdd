<?php

namespace App\Form;

use App\Entity\Staffs;
use App\Entity\Role;
use App\Entity\Cage;
use App\Entity\Aisle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StaffsType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('name')
->add('birthDate') // Исправлено: у тебя было birtDate
->add('gender')
->add('city')
->add('role', EntityType::class, [
'class' => Role::class,
'choice_label' => 'name',
'label' => 'Role',
])
->add('cages', EntityType::class, [
'class' => Cage::class,
'choice_label' => 'type', // или другое поле
'multiple' => true,
'expanded' => true,
'label' => 'Cages',
])
->add('aisles', EntityType::class, [
'class' => Aisle::class,
'choice_label' => 'name',
'multiple' => true,
'expanded' => true,
'label' => 'Aisles',
]);
}

public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Staffs::class,
]);
}
}

