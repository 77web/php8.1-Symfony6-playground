<?php

namespace App\Form;

use App\Domain\Data\Contact;
use App\Domain\Enum\Age;
use App\Domain\Enum\Interest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('age', EnumType::class, [
                'class' => Age::class,
            ])
            ->add('interests', EnumType::class, [
                'class' => Interest::class,
                'multiple' => true,
            ])
            ->add('opinion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
