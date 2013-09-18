<?php

namespace Infocorp\Bundle\SintufBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class MenuAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('url')
            ->add('parent', 'sonata_type_model_list', array(
                'label' => 'Pai',
                'required' => false,
            ))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Nome'))
            ->add('url')
            ->add('parent', null, array('label' => 'Pai'))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('parent', null, array('label' => 'Pai'))
        ;
    }
}