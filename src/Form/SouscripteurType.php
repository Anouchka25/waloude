<?php

namespace App\Form;

use App\Entity\Souscripteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SouscripteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite')
            ->add('nom')
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
            ->add('situation_familiale')
            ->add('nombre_enfants')
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
