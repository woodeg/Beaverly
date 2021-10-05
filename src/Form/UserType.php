<?php

namespace App\Form;

use App\Entity\Group;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            /* ->add('roles') */
            ->add('firstName')
            ->add('lastName')
            ->add('isActive')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ADMIN' => 'ROLE_ADMIN', 
                    'USER' => 'ROLE_USER'
                ],
                'expanded' => true,
                'multiple' => true,
            ]
        )
            ->add('userDescription')
            ->add('groups', EntityType::class, [
                'class' => Group::class, 
                'choice_label' => 'groupName'
            ])
            ->add('plainPassword')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
