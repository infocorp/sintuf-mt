<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DirectionController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Direction');

        $direction = $instManager->findBy(array('enabled' => 1));

        return $this->render('InfocorpSintufBundle:Direction:list.html.twig', array(
            'direction' => $directions,
        ));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Direction');

        $directions = $instManager->findBy(array('enabled' => 1));
        $directionContent = $instManager->findOneBy(array(
            'slug' => $slug, 
            'enabled' => 1,
        ));

        if (!$directionContent) {
            throw new NotFoundHttpException('Diretor não encontrado');
        }

        return $this->render('InfocorpSintufBundle:Direction:view.html.twig');
    }
}