<?php

namespace App\Form;

use App\Entity\Convention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ConventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_convention')
            ->add('sujet_convention')
            ->add('date_convention')
            ->add('montant_global')
            ->add('situation_convention')
            ->add('date_signature')
            ->add('montant_emis')
            ->add('montant_restant')
            ->add('date_visa')
            ->add('image_convention')
            ->add('etat_avancement')
            ->add('pourcentage')
            ->add('date_approbation')
            ->add('contribution_region')
            ->add('saison')
            ->add('ID_secteur')
            ->add('ID_province')
            ->add('save', SubmitType::class,['attr'=>['class'=>'btna']
])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Convention::class,
        ]);
    }
}
