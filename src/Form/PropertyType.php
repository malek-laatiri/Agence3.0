<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('surface')
            ->add('bedroom')
            ->add('floor')
            ->add('price')
            ->add('city')
            ->add('address')
            ->add('postal_code')
            ->add('rooms',RoomsType::class)
            ->add('propertyname',CategoryType::class)

            ->add('choix',ChoixType::class)
            ->add('heat',HeatType::class)
            ->add('equipement',EquipementType::class)

            ->add('save',SubmitType::class)

        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
