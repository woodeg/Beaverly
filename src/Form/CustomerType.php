<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Customer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('lastName', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('isActive', CheckboxType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('position', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('company', EntityType::class, [
                'class' => Company::class, 
                'choice_label' => 'companyName',
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'mb-2'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
