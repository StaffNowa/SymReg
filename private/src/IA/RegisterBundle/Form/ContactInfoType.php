<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('tel')
            ->add('fax')
            ->add('email')
            ->add('www_address')
            ->add('first_name')
            ->add('last_name')
            ->add('personal_code')
//            ->add('updated_at')
//            ->add('created_at')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\ContactInfo'
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_contactinfotype';
    }
}
