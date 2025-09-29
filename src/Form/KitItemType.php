<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Item;
use App\Entity\ItemVariant;
use App\Entity\KitItem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KitItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('variant', EntityType::class, [
                'class' => ItemVariant::class,
                'choice_label' => function (ItemVariant $variant) {
                    return $variant->getItem()->getName() . ' - ' . $variant->getName();
                },
                'choice_value' => 'id',
                'attr' => ['class' => 'select w-full'],
            ])
            ->add('quantity', NumberType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('personalNotes', TextAreaType::class, [
                'required' => false,
                'attr' => ['class' => 'textarea w-full'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => KitItem::class,
        ]);
    }
}
