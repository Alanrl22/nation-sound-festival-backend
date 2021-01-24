<?php

namespace App\Form;

use App\Entity\Festival;
use App\Entity\Stage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,     [
                'label' => 'Nom de la scène'
            ])
            ->add('coordinate', TextType::class,     [
                'label' => 'Coordonnées'
            ])
            ->add('Category', TextType::class,     [
                'label' => 'Catégorie'
            ])
            ->add('festival', EntityType::class,     [
                'class' => Festival::class,
                'label' => 'Festival'
            ])
            ->add('Enregister', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}