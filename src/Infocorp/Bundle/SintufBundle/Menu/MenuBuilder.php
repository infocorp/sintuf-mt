<?php

namespace Infocorp\Bundle\SintufBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menuManager = $this->container->get('doctrine')->getManager()->getRepository('InfocorpSintufBundle:Menu');
        $menuItens = $menuManager->findBy(array('parent' => null));

        $menu->addChild('Home', array('route' => 'infocorp_sintuf_homepage'));

        foreach ($menuItens as $item) {
            $menuItemOptions = array('uri' => $item->getUrl());
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
        ));

        return $menu;
    }
}