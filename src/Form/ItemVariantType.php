<?php

namespace App\Form;

use App\Entity\ItemVariant;
use App\Form\DataTransformer\JsonTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemVariantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $specs = $builder->create('specifications', TextareaType::class, [
            'label' => 'Specifications (JSON)',
            'attr' => ['class' => 'textarea w-full', 'rows' => 7],
        ]);
        $specs->addModelTransformer(new JsonTransformer());

        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('sku', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('weight', NumberType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('price', NumberType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add($specs)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ItemVariant::class,
        ]);
    }
}
