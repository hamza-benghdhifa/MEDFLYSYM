<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Messages1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ObjetMessage', TextType::class, [
                'label' => 'Object',
                'attr' => ['class' => 'form-control'], // Add any additional styling classes here
            ])
            ->add('ContenuMessage', TextType::class, [
                'label' => 'Content',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('EmailDestinataire', TextType::class, [
                'label' => 'Recipient Email',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
        ]);
    }
}
