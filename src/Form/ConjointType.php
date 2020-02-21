<?php

namespace App\Form;

use App\Entity\Conjoint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConjointType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('pays_naissance')
            ->add('ville_naissance')
            ->add('profession')
            ->add('meme_adresse')
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('telephone')
            ->add('tel_domicile')
            ->add('email')
            ->add('souscripteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conjoint::class,
        ]);
    }
}
