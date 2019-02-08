<?php

namespace App\Form;

use App\Entity\Pics;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ImageUplaodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imagefile',VichFileType::class,['class'=>Pics::class])
        ;
        $builder->get('imagefile')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event)
            {
                dump($event->getform());
                dump($event->getForm()->getData());
            });

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pics::class,
        ]);
    }
}
