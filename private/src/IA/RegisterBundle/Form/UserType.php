<?php

namespace IA\RegisterBundle\Form;

use IA\RegisterBundle\Entity\ContactInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => 'Login'
            ))
            ->add('email', 'email', array(
                'mapped' => false
            ))
            ->add('password', 'repeated'
                , array(
                    'first_name'  => 'password',
                    'second_name' => 'confirm',
                    'type'        => 'password',
                )
            )
            ->add('terms', 'checkbox', array(
                'label' => ' I agree with the'
                , 'mapped' => false
            ))
//            ->add('url')
//        <a href="#">Terms and Conditions</a>
//            ->add('Sign Up', 'submit', array(
//                'attr' => array(
//                    'class' => 'btn btn-primary pull-right'
//                )
//            ))
//            ->add('updated_at', 'text', array(
//                'data' => date('Y-m-d H:i:s', time())
//                , 'format' => 'yyyy-MM-dd'
//            ))
//            ->add('created_at', 'text', array('data' => date('Y-m-d H:i:s', time())))
//            ->add('email', new ContactInfoType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\User'
            , 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_usertype';
    }
}
