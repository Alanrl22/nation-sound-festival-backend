<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\MusicStyle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,     [
                'label' => 'Nom de l\'artiste'
            ])
            ->add('musicStyle', EntityType::class,     [
                'class' => MusicStyle::class,
                'label' => 'Genre musical'
            ])
            ->add('description', TextareaType::class,     [
                'label' => 'Description',
                'attr' => [
                    'rows' => 10,
                ],
            ])
            ->add('image', TextType::class,     [
                'label' => 'Image'
            ])
            ->add('bigArtist', CheckboxType::class,     [
                'label' => 'Tête d\'affiche ?',
                'label_attr' => [
                    'class' => 'inline',
                ],
                'attr' => [
                    'class' => 'inline',
                ],
            ])
            ->add('Enregistrer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
