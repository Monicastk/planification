<?php

namespace App\Form;

use App\Entity\Events;
use App\Entity\file;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('start_date', null, [
                'widget' => 'single_text',
            ])
            ->add('end_date', null, [
                'widget' => 'single_text',
            ])
            ->add('location')
            ->add('create_at', null, [
                'widget' => 'single_text',
            ])
            ->add('price')
            ->add('User', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('file', EntityType::class, [
                'class' => file::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}
