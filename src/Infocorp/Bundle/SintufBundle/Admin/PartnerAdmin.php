<?php
namespace Infocorp\Bundle\SintufBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\FormatterBundle\Formatter\Pool as FormatterPool;

class PartnerAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper
            ->add('title', null, array('label' => 'Nome'))
            ->add('link')
            ->add('image', 'sonata_type_model_list', array('label' => 'Imagem'))
            ->add('enabled', null, array(
                'label' => 'Habilitado',
                'attr' => array(
                    'checked' => true,
                ),
            ))
            ->add('content', 'sonata_formatter_type', array(
                'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field' => 'contentFormatter',
                'source_field' => 'rawContent',
                'source_field_options' => array(
                    'attr' => array('class' => 'span10', 'rows' => 20),
                ),
                'target_field' => 'content',
                'listener' => true,
                'label' => 'Detalhes',
            ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        return $showMapper
            ->add('title', null, array('label' => 'Nome'))
            ->add('image', null, array('label' => 'Imagem'))
            ->add('enabled', null, array('label' => 'Habilitado'))
            ->add('link')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        return $datagridMapper
            ->add('enabled', null, array('label' => 'Habilitado'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        return $listMapper
            ->addIdentifier('title', null, array('label' => 'Nome'))
            ->add('enabled', null, array(
                'label' => 'Habilitado', 
                'editable' => true,
            ))
        ;
    }
}