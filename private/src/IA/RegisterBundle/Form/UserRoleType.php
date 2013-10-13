<?php
/**
 * Created by PhpStorm.
 * User: staff - info@prado.lt
 * Date: 2013-10-11
 * Time: 22:15
 */

namespace IA\RegisterBundle\Form;

use \Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserRoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('role', 'entity', array(
                'class' => 'IA\RegisterBundle\Entity\Role'
                    , 'empty_value' => false
                    , 'multiple' => true
                    , 'expanded' => false
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
//        $resolver->setDefaults(array(
//            'data_class' => 'IA\RegisterBundle\Entity\User'
//            , 'cascade_validation' => true
//        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_user_role_type';
    }

}