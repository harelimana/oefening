<?php
/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 28.07.17
 * Time: 21:36
 */

namespace AppBundle\Form;

//use AppBundle\Entity\User;
use AppBundle\Entity\users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('profile_picture', TextType::class)

        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => users::class,
        ));
    }
}