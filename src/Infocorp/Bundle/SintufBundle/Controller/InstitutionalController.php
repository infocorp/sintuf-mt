<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstitutionalController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Institutional');

        $institutionals = $instManager->findBy(array('enabled' => 1));

        return $this->render('InfocorpSintufBundle:Institutional:list.html.twig', array(
            'institutionals' => $institutionals,
        ));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Institutional');

        $institutionals = $instManager->findBy(array('enabled' => 1));
        $institutionalContent = $instManager->findOneBy(array(
            'slug' => $slug, 
            'enabled' => 1,
        ));

        if (!$institutionalContent) {
            throw new NotFoundHttpException('Item institucional não encontrado');
        }

        return $this->render('InfocorpSintufBundle:Institutional:view.html.twig');
    }
}