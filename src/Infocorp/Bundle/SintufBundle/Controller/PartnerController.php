<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartnerController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Partner');

        $partners = $instManager->findBy(array('enabled' => 1));

        return $this->render('InfocorpSintufBundle:Partner:list.html.twig', array(
            'partners' => $partners,
        ));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Partner');

        $partners = $instManager->findBy(array('enabled' => 1));
        $partnerContent = $instManager->findOneBy(array(
            'slug' => $slug, 
            'enabled' => 1,
        ));

        if (!$partnerContent) {
            throw new NotFoundHttpException('Parceiro não encontrado');
        }

        return $this->render('InfocorpSintufBundle:Partner:view.html.twig', array(
            'partner' => $partnerContent,
        ));
    }

    public function homeListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instManager = $em->getRepository('InfocorpSintufBundle:Partner');

        $partners = $instManager->findBy(array('enabled' => 1));

        return $this->render('InfocorpSintufBundle:Partner:home_list.html.twig', array(
            'partners' => $partners,
        ));
    }
}