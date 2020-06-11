<?php

namespace App\Form;

use App\Entity\Enfant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class EnfantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de famille *',
                'attr' => ['class' => 'input'], 
                ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom *',
                'attr' => ['class' => 'input'], 
                ])
            ->add('date_naissance', BirthdayType::class, [
                'attr' => ['class' => 'input'],
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',  
                ],
                'label' => 'Date de naissance *'
            ])
            /* ->add('lien_affiliation', ChoiceType::class, [
                'choices'  => [
                    'Enfant commun' => 'enfant_commun',
                    'Votre enfant' => 'votre_enfant',
                    'Enfant du conjoint' => 'enfant_conjoint',
                ],
            ]) */
            //->add('souscripteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class,
        ]);
    }
}
