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
}