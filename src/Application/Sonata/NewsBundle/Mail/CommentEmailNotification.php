<?php
namespace Application\Sonata\NewsBundle\Mail;

use Sonata\NewsBundle\Mailer\MailerInterface;

class CommentEmailNotification implements MailerInterface 
{
    protected $mailer;

    protected $templating;

    protected $mailManager;

    protected $mailFrom;

    public function __construct($mailer, EngineInterface $templating, MailManager $mailManager, $mailFrom)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->mailManager = $mailManager;
        $this->mailFrom = $mailFrom;
    }

    public function sendCommentNotification(CommentInterface $comment)
    {
        $rendered = $this->templating->render('ApplicationSonataNewsBundle:Mail:notification.txt.twig', array(
            'comment' => $comment,
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('Sintuf-MT - Novo comentário')
            ->setFrom($this->emails['from'])
            ->setTo($this->mailManager->getEmails())
            ->setBody($rendered);

        $this->mailer->send($message);
    }
}