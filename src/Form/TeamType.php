<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\Image;


class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pays')
            ->add('region')
            ->add('ville')
            ->add('code_postal')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('photo', FileType::class, [
                'label' => 'Image(JPG, PNG)',
                'required' => true,
                'constraints' => [
                    new Image(),
                    ]
                    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
