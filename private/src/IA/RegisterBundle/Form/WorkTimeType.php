<?php

namespace IA\RegisterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkTimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pos_id')
            ->add('user_id')
            ->add('work_time_start')
            ->add('work_time_end')
            ->add('breakfast')
            ->add('data_json')
            ->add('updated_at')
            ->add('created_at')
            ->add('work_pos')
            ->add('work_user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IA\RegisterBundle\Entity\WorkTime'
        ));
    }

    public function getName()
    {
        return 'ia_registerbundle_worktimetype';
    }
}
