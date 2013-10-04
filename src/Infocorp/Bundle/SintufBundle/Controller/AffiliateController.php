<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Infocorp\Bundle\SintufBundle\Entity\Affiliate;
use Infocorp\Bundle\SintufBundle\Entity\Dependent;

class AffiliateController extends Controller
{
	public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$affiliate = new Affiliate();

    	$form = $this->createForm('form_affiliate', $affiliate);

    	return $this->render('InfocorpSintufBundle:Affiliate:index.html.twig', array(
    		'form' => $form->createView(),
		));
    }

    public function createAction(Request $request)
    {
    	if ('POST' == $request->getMethod()) {
    		$affiliate = new Affiliate();
    		$form = $this->createForm('form_affiliate', $affiliate);
    		
    		$form->handleRequest($request);

    		if (!$form->isValid()) {
    			// Retorna formulários com os erros de validação
    			return $this->render('InfocorpSintufBundle:Affiliate:index.html.twig', array(
					'form' => $form->createView(),
				));
    		}

    		$em = $this->getDoctrine()->getManager();
    		$em->persist($form->getData());
    		$em->flush();

    		// Se tudo correr bem, adiciona mensagem de sessão e redireciona pra home
    		$this->get('session')->getFlashBag()->add('success', 'Cadastro efetuado com sucesso, em breve entraremos em contato!');
    	}
		
		return $this->redirect($this->generateUrl('infocorp_sintuf_homepage'));
    }
}