<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name:'
                ]
            )
            ->add('age', IntegerType::class)
            ->add(
                'childrenCnt',
                IntegerType::class,
                [
                    'label' => 'Children:'
                ]
            )
            ->add('hasCompanyCar', CheckboxType::class,
                [
                    'required' => false
                ]
            )
            ->add(
                'salary',
                MoneyType::class,
                [
                    'label' => 'Salary:',
                    'currency' => null
                ]
            )
            ->add('calculate', SubmitType::class)
        ;
    }
}
