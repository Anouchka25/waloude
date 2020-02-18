<?php

namespace App\Form;

use App\Entity\Contrat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nbre_enfants', ChoiceType::class, [
                'choices' => [
                  '1' => '1',
                  '2' => '2',
                  '3' => '3',
                  '4' => '4',
                  '5' => '5',
                  '6' => '6',
                  '7' => '7',
                  '8' => '8',
                  '9' => '9',
                  '10' => '10',  
                ]
            ])
            ->add('nom_enfant') //Nom de l'enfant
            ->add('prenom_enfant') // Prénom de l'enfant
            ->add('date_naissance_enfant')
            ->add('lien_affiliation', ChoiceType::class, [
                'choices' => [
                  'Enfant commum' => 'commum',
                  'Votre enfant' => 'votre_enfant',
                  'Enfant du conjoint' => 'enfant_conjoint'  
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
