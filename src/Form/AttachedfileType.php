<?php

namespace App\Form;

use App\Entity\Attachedfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttachedfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('IP')
            ->add('Zone')
            ->add('ORACLE_HOME_Path')
            ->add('ORACLE_BASE_Path')
            ->add('ORACLE_SID')
            ->add('SGA')
            ->add('PGA')
            ->add('ORACLE_version')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Attachedfile::class,
        ]);
    }
}
