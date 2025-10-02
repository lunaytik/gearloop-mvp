<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Item;
use App\Form\DataTransformer\JsonTransformer;
use App\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Need to set model transformer before to avoid symfony form to receive an array instead of a formatted JSON string
        $specs = $builder->create('specifications', TextareaType::class, [
            'attr' => ['class' => 'textarea w-full', 'rows' => 10],
        ]);
        $specs->addModelTransformer(new JsonTransformer());

        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('brand', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('model', TextType::class, [
                'attr' => ['class' => 'input w-full'],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'textarea w-full', 'rows' => 5],
            ])
            ->add('imageUrl', UrlType::class, [
                'required' => false,
                'attr' => ['class' => 'input w-full'],
            ])
            ->add($specs)
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => function (Category $category) {
                    return $category->getParent()->getName() . ' - ' . $category->getName();
                },
                'query_builder' => function (CategoryRepository $cr) {
                    return $cr->createQueryBuilder('c')
                        ->andWhere('c.parent IS NOT NULL');
                },
                'attr' => ['class' => 'select w-full'],
            ])
            ->add('itemVariants', CollectionType::class, [
                'entry_type' => ItemVariantType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype_options' => [
                    'attr' => ['class' => 'flex flex-col gap-2'],
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
