<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
            'attr' => [
                'class' => 'is-large'
            ]])
            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'is-large'
                ]])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'is-large'
                ]])
            ->add('confirmPassword', PasswordType::class, [
                'attr' => [
                    'class' => 'is-large'
                ]])
           // ->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
