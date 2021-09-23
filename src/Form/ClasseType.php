<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Prof;
use PhpParser\Parser\Multiple;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('niveau', TextType::class)
            ->add('prof_principal', EntityType::class,[
                'class' => Prof::class,
                'choice' => 'nom',
                'multiple' => true,
            ])
            ->add('submit', SubmitType::class,[
            'name' => 'Ajouter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
