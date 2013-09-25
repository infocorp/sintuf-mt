<?php

namespace Infocorp\Bundle\SintufBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array(
        	'attributes' => array(
        		'class' => 'clearfix sf-js-enabled sf-shadow',
    		),
    	));

        // Retrieves the menu itens added to database
        $menuManager = $this->container->get('doctrine')->getManager()->getRepository('InfocorpSintufBundle:Menu');
        $menuItens = $menuManager->findBy(array('parent' => null));

        // Add default itens
        $menu->addChild('Home', array(
        	'route' => 'infocorp_sintuf_homepage',
        	'linkAttributes' => array(
            	'class' => 'sf-with-ul',
        	),
    	));
        $menu->addChild('Notícias', array(
        	'route' => 'infocorp_sintuf_noticias',
        	'linkAttributes' => array(
            	'class' => 'sf-with-ul',
        	),
    	));

        // Add database menu itens 
        foreach ($menuItens as $item) {
            $menuItemOptions = array(
            	'uri' => $item->getUrl(),
            	'linkAttributes' => array(
            		'class' => 'sf-with-ul',
        		),
        	);
            if ($item->isBlankPage()) {
                $menuItemOptions['linkAttributes'] = array(
                    'target' => '_blank',
                );
            }
            $menuElement = $menu->addChild($item->getName(), array(
                'uri' => $item->getUrl(),
            ));

            if ($item->hasChildren()) {
                foreach ($item->getChildren() as $child) {
                    $options = array('uri' => $child->getUrl());
                    if ($child->isBlankPage()) {
                        $options['linkAttributes'] = array(
                            'target' => '_blank',
                        );
                    }
                    $menuElement->addChild($child->getName(), $options);
                }
            }
        }
        
        $menu->addChild('Contato', array(
            'route' => 'infocorp_sintuf_fale_conosco',
            'linkAttributes' => array(
            	'class' => 'sf-with-ul',
        	),
        ));

        return $menu;
    }
}