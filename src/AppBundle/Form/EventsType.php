<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 04.08.17
 * Time: 13:00
 */

namespace AppBundle\Form;

use AppBundle\Entity\event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EventsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('description', TextType::class)
            ->add('debut', dateTimeType::class)
            ->add('fin', dateTimeType::class)
        /*    ->add('categorie_id', integerType::class)
            ->add('image_id', integerType::class) */
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => event::class,
        ));
    }
}