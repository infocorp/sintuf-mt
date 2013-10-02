<?php

namespace Infocorp\Bundle\SintufBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Infocorp\Bundle\SintufBundle\Entity\Affiliate;
use Infocorp\Bundle\SintufBundle\Form\DependentType;

class AffiliateAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('registration', 'text', array('label' => 'Matrícula'))
            ->add('name', null, array('label' => 'Nome'))
            ->add('address', null, array('label' => 'Endereço'))
            ->add('district', null, array('label' => 'Bairro'))
            ->add('email', 'email', array('label' => 'Email'))
            ->add('phone', null, array('label' => 'Telefone'))
            ->add('cellphone', null, array('label' => 'Celular'))
            ->add('city', null, array('label' => 'Cidade'))
            ->add('state', null, array('label' => 'Estado'))
            ->add('birthCity', null, array('label' => 'Cidade natal'))
            ->add('state', null, array('label' => 'UF'))
            ->add('birthDate', null, array(
                'label' => 'Data de nascimento',
                'widget' => 'single_text',
            ))
            ->add('sex', 'choice', array(
                'choices' => array(
                    'm' => 'Masculino',
                    'f' => 'Feminino',
                ),
                'label' => 'Sexo',
            ))
            ->add('civilStatus', 'choice', array(
                'choices' => array(
                    'solteiro' => 'Solteiro',
                    'casado' => 'Casado',
                    'divorciado' => 'Divorciado',
                    'viuvo' => 'Viúvo',
                ),
                'label' => 'Estado civil',
            ))
            ->add('associateDate', null, array(
                'widget' => 'single_text',
                'label' => 'Data admissão sócio'
            ))
            ->add('filiationFather', null, array(
                'label' => 'Pai',
            ))
            ->add('filiationMother', null, array(
                'label' => 'Mãe',
            ))
            ->add('scholarity', 'choice', array(
                'choices' => array(
                    Affiliate::SCHOLARITY_ELEMENTARY_INCOMPLETE => 'Ensino fundamental incompleto',
                    Affiliate::SCHOLARITY_ELEMENTARY_COMPLETE => 'Ensino fundamental completo',
                    Affiliate::SCHOLARITY_MEDIUM_INCOMPLETE => 'Ensino médio incompleto',
                    Affiliate::SCHOLARITY_MEDIUM_COMPLETE => 'Ensino médio completo',
                    Affiliate::SCHOLARITY_SUPERIOR_INCOMPLETE => 'Ensino superior incompleto',
                    Affiliate::SCHOLARITY_SUPERIOR_COMPLETE => 'Ensino superior completo',
                ),
                'label' => 'Nível de instrução',
            ))
            ->add('registrationId', null, array('label' => 'RG'))
            ->add('expeditionOrgan', null, array('label' => 'Orgão de expedição'))
            ->add('expeditionDate', null, array(
                'widget' => 'single_text',
                'label' => 'Data de expedição',
            ))
            ->add('cpf', null, array('label' => 'CPF'))
            ->add('ctps', null, array('label' => 'CTPS'))
            ->add('pis', null, array('label' => 'PIS/PASEP'))
            ->add('voterTitle', null, array('label' => 'Título de eleitor'))
            ->add('zone', null, array('label' => 'Zona'))
            ->add('section', null, array('label' => 'Seção'))
            ->add('level', null, array('label' => 'Nível'))
            ->add('class', null, array('label' => 'Classe'))
            ->add('pattern', null, array('label' => 'Padrão'))
            ->add('admissionDate', null, array(
                'widget' => 'single_text',
                'label' => 'Data de admissão',
            ))
            ->add('stocking', null, array('label' => 'Lotação'))
            ->add('bankName', null, array('label' => 'Banco'))
            ->add('function', null, array('label' => 'Cargo/Função'))
            ->add('bankAgency', null, array('label' => 'Agencia'))
            ->add('bankAccount', null, array('label' => 'Conta'))
            ->add('dependents', 'collection', array(
                'type' => new DependentType(),
                'label' => 'Dependentes',
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            ))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('registration', null, array(
                'label' => 'Matrícula',
            ))
            ->add('associateData', null, array(
                'label' => 'Data de associação',
            ))
            ->add('email')
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('registration', null, array(
                'label' => 'Matrícula',
            ))
            ->addIdentifier('name', null, array(
                'label' => 'Nome',
            ))
            ->add('email')
            ->add('associateData', null, array(
                'label' => 'Data de associação',
            ))
        ;
    }
}