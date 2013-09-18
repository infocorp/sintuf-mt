<?php

namespace Infocorp\Bundle\SintufBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Infocorp\Bundle\SintufBundle\Entity\Dependent;

class DependentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'Nome',
                'required' => false,
            ))
            ->add('kinshipDegree', 'choice', array(
                'choices' => array(
                    Dependent::KINSHIP_FIRST_DEGREE => 'Esposo(a)',
                    Dependent::KINSHIP_SECOND_DEGREE => 'Filho (a)',
                    Dependent::KINSHIP_THIRD_DEGREE => 'Outros',
                ),
                'required' => false,
                'label' => 'Dependente',
            ))
            ->add('birthDate', null, array(
                'label' => 'Data de nascimento',
                'required' => false,
                'widget' => 'single_text',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Infocorp\Bundle\SintufBundle\Entity\Dependent',
        ));
    }

    public function getName()
    {
        return 'form_dependent';
    }
}