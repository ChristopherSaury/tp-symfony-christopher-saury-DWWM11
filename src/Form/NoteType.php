<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Note;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', FloatType::class)
            ->add('coefficient', FloatType::class)
            ->add('date',DateType::class,[
                'widget' => 'choice'
            ])
            ->add('matiere', EntityType::class,[
                'class' => Matiere::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('eleve')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
