<?php

namespace App\Form;

use App\Entity\Kit;
use App\Enum\ActivityType;
use App\Enum\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextAreaType::class, [
                'required' => false,
            ])
            ->add('isPublic', CheckboxType::class, [
                'required' => false,
            ])
            ->add('activityType', EnumType::class, [
                'class' => ActivityType::class,
                'choice_label' => 'label',
            ])
            ->add('season', EnumType::class, [
                'class' => Season::class,
                'choice_label' => 'label',
            ])
            ->add('kitItems', CollectionType::class, [
                'entry_type' => KitItemType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);
//            ->add('owner', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => 'id',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kit::class,
        ]);
    }
}
