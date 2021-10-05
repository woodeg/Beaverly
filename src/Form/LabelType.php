<?php

namespace App\Form;

use App\Entity\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('labelName', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('isActive', CheckboxType::class, ['attr' => ['class' => 'form-check']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Label::class,
        ]);
    }
}
