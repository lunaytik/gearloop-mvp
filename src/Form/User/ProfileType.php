<?php

namespace App\Form\User;

use App\Entity\User;
use App\Enum\ExperienceLevel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('displayName', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('bio', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'textarea w-full', 'rows' => 5],
            ])
            ->add('location', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('avatar', UrlType::class, [
                'required' => false,
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('experienceLevel', EnumType::class, [
                'class' => ExperienceLevel::class,
                'choice_label' => 'label',
                'attr' => ['class' => 'select w-full'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
