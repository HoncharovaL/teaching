<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', null, array('label' =>'Имя'))
                ->add('patronymic', null, array('label' =>'Отчество'))
                ->add('surname', null, array('label' =>'Фамилия'))
                ->add('photoFile', VichImageType::class, [
                    'required' => false,
                    'allow_delete' => true, // optional, default is true
                    'download_link' => true, // optional, default is true
                ])
                ->add('phone', null, array('label' =>'Телефон'))
                ->add('about', null, array('label' =>'Обо мне'))
                ->add('education', ChoiceType::class, ['label' => 'Образование', 'choices' => ['Ученая степень' => 'Ученая степень', 'Высшее' => 'Высшее', 'Неоконченное высшее' => 'Неоконченное высшее', 'Среднее' => 'Среднее']])
                ->add('experience', ChoiceType::class, ['label' => 'Опыт преподавательской деятельности', 'choices' => ['до 1 года' => 'до 1 года', 'от 1 до 5 лет' => 'от 1 до 5 лет', 'от 5 до 10 лет' => 'от 5 до 10 лет', 'более 10 лет' => 'более 10 лет']])
                ->add('university', null, array('label' =>'Оконченные учебные заведения'))
;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
