<?php
namespace Application\Sonata\NewsBundle\Mail;

class MailManager
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getEmails()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $commentModerators = $userManager->getUsersBy(array('commentModerator' => true));

        $emailsTo = array();
        foreach ($commentModerators as $moderator) {
            $emailsTo[] = $moderator->getEmail();
        }

        return $emailsTo;
    }
}