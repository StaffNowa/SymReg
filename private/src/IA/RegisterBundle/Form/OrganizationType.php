<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrganizationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('org_name')
//            ->add('country_id')
//            ->add('city_id')
//            ->add('contact_info_id')
//            ->add('data_json')
//            ->add('updated_at')
//            ->add('created_at')
            ->add('org_contact')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\Organization'
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_organizationtype';
    }
}
