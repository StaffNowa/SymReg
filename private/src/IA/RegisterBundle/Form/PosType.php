<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use IA\RegisterBundle\Form\EventListener\AddPosContactFieldSubscriber;

class PosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region')
            ->add('pos_org', 'entity'
                , array(
                    'class' => 'IARegisterBundle:Organization'
                    , 'label' => 'Organization'
                    , 'empty_value' => ''
                )
            )
            ->add('pos_contact', 'entity'
                , array(
                    'class' => 'IARegisterBundle:ContactInfo'
                    , 'label' => 'Contact'
                    , 'empty_value' => ''
                    , 'required' => false
                )
            )
//            ->addEventSubscriber(new AddPosContactFieldSubscriber())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\Pos'
        ));
    }

    public function getName()
    {
        return 'pos';
    }
}
