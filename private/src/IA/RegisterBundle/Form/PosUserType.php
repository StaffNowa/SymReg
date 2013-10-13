<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pos_id')
            ->add('user_id')
            ->add('puser_pos')
            ->add('puser_user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\PosUser'
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_posusertype';
    }
}
