<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Group;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('firstName', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('lastName', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('isActive', CheckboxType::class, ['attr' => ['class' => 'form-check']])
            ->add('roles', ChoiceType::class, [
                    'choices' => [
                        'ADMIN' => 'ROLE_ADMIN',
                        'USER' => 'ROLE_USER'
                    ],
                    'expanded' => true,
                    'multiple' => true,
                    'attr' => ['class' => 'form-check p-0']
                ]
            )
            ->add('groups', EntityType::class, [
                'class' => Group::class, 
                'choice_label' => 'groupName',
                'attr' => ['class' => 'form-check']
            ])
            ->add('userDescription', TextareaType::class, ['attr' => ['class' => 'form-control']])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password', 'attr' => ['class' => 'form-control']),
                'second_options' => array('label' => 'Repeat Password', 'attr' => ['class' => 'form-control']),
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
                
            ))
            ->add('save', SubmitType::class, ['label' => 'Create User', 'attr' => ['class' => 'btn btn-success mt-2']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class, 
        ]);
    }
}
