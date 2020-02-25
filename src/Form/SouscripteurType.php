<?php

namespace App\Form;

use App\Entity\Souscripteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SouscripteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    'Madame' => 'madame',
                    'Mademoiselle' => 'mademoiselle',
                    'Monsieur' => 'monsieur',
                ],
            ])
            ->add('nom', TextType::class)
            ->add('prenom')
            ->add('nom_jeune_fille')
            ->add('date_naissance')
            ->add('pays_naissance')
            ->add('ville_naissance')
            ->add('pays_residence')
            ->add('ville_residence')
            ->add('profession')
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('telephone')
            ->add('tel_domicile')
            ->add('situation_familiale', ChoiceType::class, [
                'choices'  => [
                    'Marié' => 'marie',
                    'Pacsé(e)' => 'pasce',
                    'Concubin(e)' => 'concubin',
                    'Célibataire' => 'celibataire',
                    'Divorcé(e)' => 'divorce',
                    'Veuf(ve)' => 'veuf',
                ],
            ])
            ->add('nombre_enfants', ChoiceType::class, [
                'choices'  => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ],
            ])
            ->add('enfants')
            ->add('conjoint')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Souscripteur::class,
        ]);
    }
}
