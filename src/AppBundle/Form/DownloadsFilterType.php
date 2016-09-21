<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DownloadsFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('book',EntityType::class,array(
                'class' => 'AppBundle:Book',
                'choice_label' => 'title',
                'multiple' => true,
                //'expanded' => true,
            ))
            ->add('start_date')
            ->add('end_date')
            ->add('format', ChoiceType::class, array(
                'choices' => array(
                    'Todos' => 'all',
                    'Epub' => 'epub',
                    'Mobi' => 'mobi',
                    )
                )
            )
            //->add('termData')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
