<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Customer;
use App\Entity\Project;
use App\Entity\Status;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projectName', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('projectDescription', TextareaType::class, ['attr' => [
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
            ->add('deadLine', DateType::class, 
                ['widget' => 'single_text'],
                ['attr' => [
                'placeholder' => 'Select a value',
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
            ->add('type', EntityType::class, [
                'class' => Type::class, 
                'choice_label' => 'typeName',
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'mb-2'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ]
            ])
            ->add('status', EntityType::class, [
                'class' => Status::class, 
                'choice_label' => 'statusName',
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
            'data_class' => Project::class,
        ]);
    }
}
