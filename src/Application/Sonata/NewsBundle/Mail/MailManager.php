<?php
namespace Application\Sonata\NewsBundle\Mail;

use Symfony\Component\DependencyInjection\ContainerInterface;

class MailManager
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns email list from the signed users
     * 
     * @return array
     */
    public function getEmails()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $commentModerators = $userManager->findUsers();

        $emailsTo = array();
        foreach ($commentModerators as $moderator) {
            $emailsTo[] = $moderator->getEmail();
        }

        return $emailsTo;
    }
}