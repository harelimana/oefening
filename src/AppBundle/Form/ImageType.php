<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 04.08.17
 * Time: 21:52
 */

namespace AppBundle\Form;

use AppBundle\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alt', TextType::class)
            ->add('url', TextType::class)

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Image::class,
        ));
    }
}