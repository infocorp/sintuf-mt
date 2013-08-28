<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Infocorp\Bundle\SintufBundle\Entity\SlideInterface;
use Infocorp\Bundle\SintufBundle\Entity\FeaturedRepository;

class SlideController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $slideManager = $em->getRepository('InfocorpSintufBundle:Featured');

        return $this->renderSlide(
            'InfocorpSintufBundle:Block:slider.html.twig',
            $slideManager
        );
    }

    private function renderSlide($template, SlideInterface $slideManager, $limit = null, array $options = array())
    {
        $options['slides'] = $slideManager->findLastSlides($limit);
        return $this->render($template, $options);
    }
}