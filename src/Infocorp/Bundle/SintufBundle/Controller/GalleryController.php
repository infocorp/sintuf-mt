<?php
namespace Infocorp\Bundle\SintufBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function indexAction()
    {
        $galleries = $this->get('sonata.media.manager.gallery')->findBy(array(
            'enabled' => true
        ));

        if (!$galleries) {
            throw new NotFoundHttpException('Nenhuma galeria foi encontrada');
        }

        return $this->render('InfocorpSintufBundle:Gallery:index.html.twig', array(
            'galleries' => $galleries,
        ));
    }

    public function viewAction($id)
    {
        $gallery = $this->get('sonata.media.manager.gallery')->findOneBy(array(
            'id'      => $id,
            'enabled' => true,
        ));

        if (!$gallery) {
            throw new NotFoundHttpException('Não foi possível encontrar a galeria');
        }

        return $this->render('InfocorpSintufBundle:Gallery:view.html.twig', array(
            'gallery'   => $gallery,
        ));
    }
}