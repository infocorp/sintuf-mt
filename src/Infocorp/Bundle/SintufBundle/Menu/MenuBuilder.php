<?php

namespace Infocorp\Bundle\SintufBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function testMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'infocorp_sintuf_homepage'));
        $institutional = $menu->addChild('Institucional', array(
                'route' => 'infocorp_sintuf_institutional_list',
        ));
        $institutional->addChild('blabla');

        return $menu;
    }
}