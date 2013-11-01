<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('order_number')
            ->add('booking_user', 'entity'
                , array(
                    'class' => 'IARegisterBundle:User'
                , 'label' => 'Order Salesman'
                , 'empty_value' => ''
                , 'required' => false
                )
            )
            ->add('address', 'text', array(
                'mapped' => false
                )
            )
            ->add('tel', 'text', array(
                'mapped' => false
            ))
            ->add('fax', 'text', array(
                'mapped' => false
            ))
            ->add('email', 'text', array(
                'mapped' => false
            ))
            ->add('www_address', 'url', array(
                'label' => 'WWWW'
                , 'mapped' => false
            ))
            ->add('first_name', 'text', array(
                'mapped' => false
            ))
            ->add('last_name', 'text', array(
                'mapped' => false
            ))
            ->add('personal_code', 'text', array(
                'mapped' => false
            ))
            ->add('additional_info')
//            ->add('booking_contact', 'entity'
//                , array(
//                    'class' => 'IARegisterBundle:ContactInfo'
//                    , 'label' => 'Contact'
//                    , 'empty_value' => ''
//                    , 'required' => false
//                )
//            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\Booking'
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_bookingtype';
    }
}
