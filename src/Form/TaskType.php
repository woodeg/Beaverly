<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Project;
use App\Entity\Status;
use App\Entity\Task;
use App\Entity\User;
use App\Repository\ProjectRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taskName', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('taskDescription', TextareaType::class, ['attr' => [
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
            ->add('user', EntityType::class, [
                'class' => User::class, 
                'choice_label' => 'lastName',
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'mb-2'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ]
            ])
            ->add('project', EntityType::class, [
                'class' => Project::class, 
                /* 'query_builder' => function (ProjectRepository $pr) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.username', 'ASC');
                }, */
                'choice_label' => 'projectName',
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
            'data_class' => Task::class,
        ]);
    }
}
