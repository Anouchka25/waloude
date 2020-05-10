<?php

namespace App\Form;

use App\Entity\Souscripteur;
use App\Entity\Enfant;
use App\Form\EnfantType;
use App\Entity\Beneficiaire;
use App\Form\BeneficiaireType;
use App\Form\ConjointType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

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
                'label' => 'Civilité',
            ])
            //->add('nom', TextType::class)
            ->add('nom', TextType::class, [
                'label' => 'Nom de famille',
                'attr' => ['class' => 'input'], 
                ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'input'], 
                ])
            ->add('nom_jeune_fille', TextType::class, [
                'label' => 'Nom de de jeune fille',
                'attr' => ['class' => 'input'], 
                ])
            ->add('date_naissance', BirthdayType::class, [
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
            //->add('ville_naissance')
            ->add('pays_residence', CountryType::class, [
                'attr' => ['class' => 'input'],
                'preferred_choices'=>['FR'], 
                'label' => 'Pays de résidence'
                
            ])
            ->add('ville_residence', TextType::class, [
                'label' => 'Ville de résidence',
                'attr' => ['class' => 'input'], 
                ])
            /* ->add('profession', TextType::class, [
                'label' => 'Profession',
                'attr' => ['class' => 'input'], 
                ]) */
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['class' => 'input'], 
                ])
            ->add('tel_domicile', TextType::class, [
                'label' => 'Tél domicile',
                'attr' => ['class' => 'input'], 
                ])
            ->add('situation_familiale', ChoiceType::class, [
                'choices'  => [
                    'Marié' => 'marie',
                    'Pacsé(e)' => 'pasce',
                    'Concubin(e)' => 'concubin',
                    'Célibataire' => 'celibataire',
                    'Divorcé(e)' => 'divorce',
                    'Veuf(ve)' => 'veuf',
                ],
                'expanded'=>true,
                'multiple'=>false,
                //'label' => 'Situation familiale',
                'attr' => ['class' => 'is-checkradio'],
                
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
                'label' => 'Nombre d\'enfants'
            ])
            ->add('enfants', CollectionType::class, [
                'entry_type' => EnfantType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false
                ])
            ->add('conjoint', CollectionType::class, array(
                'label'=>'Conjoint',
                'entry_type'=>ConjointType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false
            ))

            ->add('nombre_beneficiaires', ChoiceType::class, [
                'choices'  => [
                    '1' => '1',
                    '2' => '2',
                ],
                'label' => 'Nb bénéficaires'
            ])
            ->add('beneficiaires', CollectionType::class, [
                'entry_type' => BeneficiaireType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'by_reference'=>false
                ])

            ->add('cartRecto1', FileType::class, [
                'label' => 'Pièce d\'identité recto(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])

            ->add('cartVerso1', FileType::class, [
                'label' => 'Pièce d\'identité recto(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])

            ->add('cartRecto2', FileType::class, [
                'label' => 'Pièce d\'identité recto du conjoint(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])

            ->add('cartVerso2', FileType::class, [
                'label' => 'Pièce d\'identité recto du conjoint(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])

            ->add('compoMenage', FileType::class, [
                'label' => 'Composition du ménage(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])

            ->add('autreDoc', FileType::class, [
                'label' => 'Autre document(PDF, JPG, PNG)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Souscripteur::class,
        ]);
    }
}
