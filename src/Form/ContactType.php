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
            ->add('country', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('region', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('postCode', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('street', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('house', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('email', EmailType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('webpage', UrlType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('description', TextareaType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('city', TextType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('phoneNumber', TelType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
            ->add('mobileNumber', TelType::class, ['attr' => [
                'placeholder' => 'Name',
                'class' => 'mb-2'
            ],
            'row_attr' => [
                'class' => 'form-floating',
            ],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
