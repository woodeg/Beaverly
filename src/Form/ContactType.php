<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('region', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('postCode', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('street', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('house', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('webpage', UrlType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('city', TextType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('phoneNumber', TelType::class, ['attr' => ['class' => 'form-control form-control-sm']])
            ->add('mobileNumber', TelType::class, ['attr' => ['class' => 'form-control form-control-sm mb-2']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
