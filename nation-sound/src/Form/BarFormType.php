<?php

namespace App\Form;

use App\Entity\Festival;
use App\Entity\PoiCategory;
use App\Entity\Stage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('festival', EntityType::class, [
                'class' => Festival::class,
                'label' => 'Festival',
                'required' => true,
                'placeholder' => '-- Sélectionner une édition de festival --',
            ])
            // ->add('category', EntityType::class, [
            //     'class' => PoiCategory::class,
            //     'label' => 'Catégorie',
            //     'attr' => [
            //         'class' => 'selectCategory',
            //     ],
            //     'required' => true,
            //     'placeholder' => '-- Sélectionner une catégorie --',
            // ])
            ->add('title', TextType::class, [
                'label' => 'Nom du bar',
                'required' => true,
            ])
            ->add('coordinates', TextType::class, [
                'label' => 'Coordonnées GPS',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('company', TextType::class, [
                'label' => 'Entreprise'
            ])
            ->add('Enregistrer', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
