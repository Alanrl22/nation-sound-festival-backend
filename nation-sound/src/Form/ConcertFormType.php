<?php

namespace App\Form;

use App\Entity\Concert;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcertFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hour', ChoiceType::class, [
                'choices' =>[
                    "12h" =>12,
                    "13h"=> 13,
                    "14h"=> 14,
                    "15h"=> 15,
                    "16h"=> 16,
                    "17h"=> 17,
                    "18h"=> 18,
                    "19h"=> 19,
                    "20h"=> 20,
                    "21h"=> 21,
                    "22h"=> 22,
                    "23h"=> 23,
                    "00h" => 0,
                    "01h" => 1, 
                    "02h" => 2,
                ]
            ])
            ->add('day', ChoiceType::class, [
                'choices'=> [
                    'Lundi' => 'Lundi', 
                    'Mardi' => 'Mardi', 
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                    'Dimanche'=> 'Dimanche'
                ] 
            ]
            )
            ->add('active')
            ->add('artist')
            ->add('stage')
            ->add('Enregistrer', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
