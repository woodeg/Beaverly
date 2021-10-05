<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Label;
use DateTimeImmutable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('companyDescription', TextareaType::class, ['attr' => ['class' => 'form-control']])
            ->add('label', EntityType::class, [
                'class' => Label::class, 
                'choice_label' => 'labelName',
                'attr' => ['class' => 'form-select']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
