<?php

namespace App\Form;

use App\Entity\MedecinSearchMaissa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class SearchMaissaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('specialite', ChoiceType::class, [
            'choices' => [
                
                'Dermatologue' => 'Dermatologue ',
                'Pédiatre' => 'Pédiatre',
                'Cardiologue' => 'Cardiologue',

            ],
            'placeholder' => 'Sélectionnez un type',
            'required' => true,
        ])
        ->add('pays', TextType::class, [
            'required' => false,
        ]);

        ; 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MedecinSearchMaissa::class,
        ]);
    }
}
