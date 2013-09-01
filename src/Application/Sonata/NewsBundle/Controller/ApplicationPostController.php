<?php
namespace Application\Sonata\NewsBundle\Controller;

use Sonata\NewsBundle\Controller\PostController;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sonata\NewsBundle\Model\CommentInterface;
use Sonata\NewsBundle\Model\PostInterface;

class ApplicationPostController extends PostController
{
    /**
     * Adiciona novo comentário a uma noticia
     * 
     * @param integer id id da noticia
     */
    public function addCommentAction($id)
    {
        $post = $this->getPostManager()->findOneBy(array(
            'id' => $id
        ));

        if (!$post) {
            throw new NotFoundHttpException(sprintf('Notícia (%d) não encontrada', $id));
        }

        if (!$post->isCommentable()) {
            return new RedirectResponse($this->generateUrl('infocorp_sintuf_noticia', array(
                'slug'  => $post->getSlug(),
            )));
        }

        $form = $this->getCommentForm($post);
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            $comment = $form->getData();

            $this->getCommentManager()->save($comment);
            $this->get('sonata.news.mailer')->sendCommentNotification($comment);

            return new RedirectResponse($this->generateUrl('infocorp_sintuf_noticia', array(
                'slug'  => $post->getSlug(),
            )));
        }

        return $this->render('InfocorpSintufBundle:News:view.html.twig', array(
            'news' => $post,
            'form' => $form->createView(),
        ));   
    }
}