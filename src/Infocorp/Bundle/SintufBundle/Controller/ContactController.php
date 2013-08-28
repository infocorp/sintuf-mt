<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function emailAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Formulário de contato - Sintuf')
                ->setFrom($request->request->get('email'))
                ->setTo('eduardomrb@gmail.com')
                ->setBody(
                    $this->renderView(
                        'InfocorpSintufBundle:Email:email.txt.twig', array(
                            'message' => $request->request->get('message'),
                            'name'    => $request->request->get('name'),
                        )
                    )
                )
            ;

            $session = $this->get('session');
            if ($this->get('mailer')->send($message)) {
            	$session->getFlashBag()->add('success', 'Mensagem enviada com sucesso');
            } else {
            	$session->getFlashBag()->add(
            		'error', 
            		'Não foi possível enviar mensagem, tente novamente mais tarde'
        		);
            }
        }

        return $this->render('InfocorpSintufBundle:Contact:contact.html.twig');
    }
}