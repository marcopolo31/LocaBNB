<?php

namespace App\Form;

use App\Entity\Booking;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookingType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, $this->getConfiguration("Date d'arrivée", "La date à laquelle vous comptez arriver", ["widget" => "single_text"]))
            ->add('endDate', DateType::class, $this->getConfiguration("Date de départ", "La date à laquelle vous quittez les lieux", ["widget" => "single_text"]))
            ->add('comment', TextareaType::class, $this->getConfiguration("Commentaires", "N'hesitez pas à mettre un commentaire...", ["required" => false]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
