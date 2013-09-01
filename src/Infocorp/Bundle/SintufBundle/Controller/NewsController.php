<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');
        $categoriesManager = $em->getRepository('ApplicationSonataNewsBundle:Category');

        return $this->render('InfocorpSintufBundle:News:index.html.twig', array(
            'news' => $newsManager->findNews(),
            'categories' => $categoriesManager->findBy(array('enabled' => 1)),
            'subpage' => false,
        ));
    }

    public function categoryAction($slug)
    {
    	$em = $this->getDoctrine()->getManager();
    	$newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');
    	$categoryManager = $em->getRepository('ApplicationSonataNewsBundle:Category');

    	$categories = $categoryManager->findBy(array('enabled' => 1));
    	$category = $categoryManager->findBy(array('slug' => $slug, 'enabled' => 1));

    	if (!$category) {
    		throw new NotFoundHttpException('Categoria não encontrada');
    	}

    	$news = $newsManager->findNewsByCategory($category);

    	return $this->render('InfocorpSintufBundle:News:index.html.twig', array(
    		'news' => $news,
    		'categories' => $categories,
    		'subpage' => true,
		));
    }

    public function viewAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $newsManager = $em->getRepository('ApplicationSonataNewsBundle:Post');

        $news = $newsManager->findOneBy(array('slug' => $slug, 'enabled' => 1));
        $form = $this->get('form.factory')->createNamed('comment', 'sonata_post_comment');

        if (!$news) {
        	throw new NotFoundHttpException('Notícia não encontrada');
        }

        return $this->render('InfocorpSintufBundle:News:view.html.twig', array(
        	'news' => $news,
        	'form' => $form->createView(),
    	));
    }
}