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
            ->add('id', 'hidden');
//            ->add('userroles', 'entity', array(
//                'class'    => 'IARegisterBundle:Role'
//                , 'property' => 'name'
//                , 'expanded' => true
//                , 'multiple' => true
////                , 'label'    => 'Role'
////                , 'required' => false
////                , 'query_builder' => function($repository) {
////                        return $repository->createQueryBuilder('r');
////                }
//            ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
//        $resolver->setDefaults(array(
//            'data_class' => 'IA\RegisterBundle\Entity\Role'
//            , 'cascade_validation' => true
//        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_user_role_type';
    }

}