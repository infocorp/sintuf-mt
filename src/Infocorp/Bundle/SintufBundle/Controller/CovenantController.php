<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CovenantController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Covenant');

        $covenants = $instManager->findBy(array('enabled' => 1));

        return $this->render('InfocorpSintufBundle:Covenant:list.html.twig', array(
            'covenants' => $covenants,
        ));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Covenant');

        $covenants = $instManager->findBy(array('enabled' => 1));
        $covenantContent = $instManager->findOneBy(array(
            'slug' => $slug, 
            'enabled' => 1,
        ));

        if (!$covenantContent) {
            throw new NotFoundHttpException('Convênio não encontrado');
        }

        return $this->render('InfocorpSintufBundle:Covenant:view.html.twig', array(
            'covenant' => $covenantContent,
        ));
    }
}