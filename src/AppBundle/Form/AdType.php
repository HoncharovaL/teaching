<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\AdServices;
use AppBundle\Entity\Subjects;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('adate', DateType::class, ['empty_data' => new \DateTime(), 'label' => 'Дата создания'])
                ->add('adText', null, ['label' => 'Текст объявления'])
                ->add('region', null, ['label' => 'Область'])
                ->add('town', null, ['label' => 'Населенный пункт'])
                ->add('area', null, ['label' => 'Район'])
                ->add('place', ChoiceType::class, ['label' => 'Провожу занятия', 'choices' => ['У себя' => 'У себя', 'На выезде' => 'На выезде']])
                ->add('price', null, ['label' => 'Цена'])
                ->add('currency', ChoiceType::class, ['label' => 'Валюта', 'choices' => ['грн.' => 'грн.', 'eur' => 'eur', '$' => '$']])
                ->add('durability', null, ['label' => 'Время'])
                ->add('value', ChoiceType::class, ['label' => 'Ед.времени', 'choices' => ['мин.' => 'мин.', 'час.' => 'час.']])
                ->add('subject', EntityType::class, ['label' => 'Дисциплина', 'class' => Subjects::class])
                ->add('online', ChoiceType::class, ['label' => 'Удаленно', 'choices' => ['Да' => '1', 'Нет' => '0']])
                ->add('services', EntityType::class, ['label' => 'Услуга', 'required'=> false, 'class' => AdServices::class])
                ->add('state', ChoiceType::class, ['label' => 'Состояние объявления', 'choices' => ['В работе' => '0', 'Опубликовать' => '1']]);
                 
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ad'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ad';
    }


}
