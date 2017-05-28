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
                ->add('price', null, ['label' => 'Цена'])
                ->add('currency', ChoiceType::class, ['label' => 'Валюта', 'choices' => ['грн.' => 'грн.', 'eur' => 'eur', '$' => '$']])
                ->add('durability', null, ['label' => 'Время'])
                ->add('value', ChoiceType::class, ['label' => 'Ед.времени', 'choices' => ['мин.' => 'мин.', 'час.' => 'час.']])
                ->add('dateServ', DateType::class, ['empty_data' => new \DateTime(), 'label' => 'Дата начала сервиса'])
                 ->add('services', EntityType::class, ['label' => 'Услуга', 'class' => AdServices::class])
                 ->add('subjects', EntityType::class, ['label' => 'Дисциплина', 'class' => Subjects::class]);
                 
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
