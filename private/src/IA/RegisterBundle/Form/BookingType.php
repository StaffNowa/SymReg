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
            ->add('order_salesman')
            ->add('contact_info_id')
            ->add('additional_info')
            ->add('data_json')
            ->add('updated_at')
            ->add('created_at')
            ->add('booking_user')
            ->add('booking_contact')
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
