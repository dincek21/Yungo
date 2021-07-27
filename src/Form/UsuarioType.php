<?php

namespace App\Form;

use App\Entity\Genders;
use App\Entity\Roles;
use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use App\Repository\GendersRepository;
use App\Repository\RolesRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name_user', TextType::class,[
                'attr' => [
                    'placeholder' => 'Usuario'
                ],  'label' => false
            ])
            ->add('lastname_user', TextType::class,[
                'attr' => [
                    'placeholder' => 'Apellidos'
                ],  'label' => false
            ])
            ->add('age_user', IntegerType::class,[
                'attr' => [
                    'placeholder' => 'Edad'
                ],  'label' => false
            ])
            ->add('picture_user', FileType::class,[  
                'label' => false,
                'mapped' => false,
                'required' => false,
                ])
            ->add('email_user', EmailType::class,[
                'attr' => [
                    'placeholder' => 'Email'
                ],  'label' => false
            ])
            ->add('pass_user', PasswordType::class,[
                'attr' => [
                    'placeholder' => 'Contraseña'
                ],  'label' => false
            ])
            ->add('fkRoles', EntityType::class,  [
                'class' => Roles::class,
                'query_builder' => function (RolesRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.rols', 'ASC');
                },
                'choice_label' => 'rols',
                'label' => 'Rol'
            ])
            ->add('fkGender', EntityType::class, [
                'class' => Genders::class,
                'query_builder' => function (GendersRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.genders', 'ASC');
                },
                'choice_label' => 'genders',
                'label' => 'Genero'
            ])
            ->add('Send', SubmitType::class, [
                'label' => 'Enviar',
                'attr' => ['class' => 'btn btn-default pull-right rounded md:mt-0 md:col-start-1 col-end-4 text-black-500 border-red-500 hover:bg-gray-300 border-double border-4'],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
            ]);
    }
}
