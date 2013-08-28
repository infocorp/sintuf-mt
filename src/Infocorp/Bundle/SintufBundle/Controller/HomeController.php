<?php

namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('InfocorpSintufBundle:Home:index.html.twig');

    }

}