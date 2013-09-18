<?php
namespace Infocorp\Bundle\SintufBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AffiliateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        $formBuilder
            ->add('registration')
            ->add('name')
            ->add('address')
            ->add('district')
            ->add('email')
            ->add('phone')
            ->add('city')
            ->add('state')
            ->add('city')
            ->add('birthCity')
            ->add('birthState')
            ->add('birthDate')
            ->add('sex')
            ->add('civilStatus')
            ->add('associateDate')
            ->add('filiationFather')
            ->add('filiationMother')
            ->add('scholarity')
            ->add('registrationId')
            ->add('expeditionOrgan')
            ->add('expeditionDate')
            ->add('cpf')
            ->add('ctps')
            ->add('pis')
            ->add('voterTitle')
            ->add('zone')
            ->add('section')
            ->add('level')
            ->add('class')
            ->add('pattern')
            ->add('regime')
            ->add('admissionDate')
            ->add('stocking')
            ->add('bankName')
            ->add('function')
            ->add('bankAgency')
            ->add('bankAccount')
            ->add('dependents', 'collection', array(
            	'type' => new DependentType(),
            	'label' => 'Dependentes',
            	'allow_add' => true,
            	'by_reference' => false,
            	'allow_delete' => true,
        	))
        ;
    }

    public function getName()
    {
        return 'form_affiliate';
    }
}