<?php

namespace App\Form;

use App\Entity\Beneficiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class BeneficiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance', BirthdayType::class, [
                'attr' => ['class' => 'input'],
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',  
                ],
                'label' => 'Date de naissance'
            ])
            ->add('pays_naissance', CountryType::class, [
                'attr' => ['class' => 'input'], 
                'choice_translation_locale' => null,
                'preferred_choices'=>['FR', 'SN'],
                'label' => 'Pays de naissance'
                
            ])
            ->add('telephone')
            ->add('tel_domicile')
            ->add('email')
           // ->add('souscripteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficiaire::class,
        ]);
    }
}
