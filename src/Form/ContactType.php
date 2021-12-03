<?php

namespace App\Form;

use App\Domain\Data\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('age', ChoiceType::class, [
                'choices' => [
                    'U19' => 'TEENAGER',
                    'U29' => 'AGE_20_TO_29',
                    'U39' => 'AGE_30_TO_39',
                    'U49' => 'AGE_40_TO_49',
                    'OVER50' => 'OVER_50',
                ],
            ])
            ->add('interests', ChoiceType::class, [
                'choices' => [
                    'PHP' => 'PHP',
                    'FRONTEND' => 'FRONTEND',
                    'INFRA' => 'INFRA',
                ],
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
