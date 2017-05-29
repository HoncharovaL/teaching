<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Entity\Search;
/**
 * Description of SearchType
 *
 * @author Администратор
 */
class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', null, array('required'   => false,'empty_data' => 'Дисциплина',))
                ->add('town', null, array('required'   => false,'empty_data' => 'Населенный пункт',))
                ->add('area', null, array('required'   => false,'empty_data' => 'Район',))
                ->add('place', ChoiceType::class, ['required'=> false,'empty_data' => 'Место занятий', 'choices' => ['У себя' => 'У себя', 'На выезде' => 'На выезде']])
                ->add('pricemin', null, array('required'   => false,'empty_data' => 'Цена от',))
                ->add('pricemax', null, array('required'   => false,'empty_data' => 'Цена до',))
                ->add('currency', ChoiceType::class, ['required'=> false,'empty_data' => 'Валюта', 'choices' => ['грн.' => 'грн.', 'eur' => 'eur', '$' => '$']]);

                 
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Search'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_search';
    }
}
