<?php

namespace App\Form;

use App\Entity\MultinodeRequestCreate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultinodeRequestCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('report', CollectionType::class, [
                'entry_type' => MultinodeRequestCreateItemType::class,
                'allow_add' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MultinodeRequestCreate::class,
            'csrf_protection' => false,
        ]);
    }
}
