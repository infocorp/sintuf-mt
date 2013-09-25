<?php

namespace Infocorp\Bundle\SintufBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function testMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menuManager = $this->container->get('doctrine')->getManager()->getRepository('InfocorpSintufBundle:Menu');
        $menuItens = $menuManager->findBy(array('parent' => null));

        $menu->addChild('Home', array('route' => 'infocorp_sintuf_homepage'));

        foreach ($menuItens as $item) {
        	$menuElement = $menu->addChild($item->getName(), array(
        		'uri' => $item->getUrl(),
    		));

    		if ($item->hasChildren()) {
    			foreach ($item->getChildren() as $child) {
    				$menuElement->addChild($child->getName(), array(
    					'uri' => $child->getUrl(),
					));
    			}
    		}
        }
        
        $menu->addChild('Contato', array(
        	'route' => 'infocorp_sintuf_fale_conosco',
		));

        return $menu;
    }
}