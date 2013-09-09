<?php
namespace Application\Sonata\NewsBundle\Tests\Mail;

use Application\Sonata\NewsBundle\Mail\MailManager;
use Application\Sonata\UserBundle\Entity\User;

class MailManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $mailManager;

    public function setUp()
    {
        $userManager = $this->getMockBuilder('FOS\UserBundle\Doctrine\UserManager')
        	->disableOriginalConstructor()
        	->getMock()
        	->expects($this->once())
        	->method('findUsers')
        	->will($this->returnValue($this->getSampleEmails()));

        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface')
        	->expects($this->once())
        	->method('get')
        	->with($this->stringContains('fos_user.user_manager'))
        	->will($this->returnValue($userManager));

        $this->mailManager = new MailManager($container);
    }

    public function getSampleEmails()
    {
    	$user1 = new User();
    	$user1->addRole('ROLE_SUPER_ADMIN')
    		->setEmail('sample@email.com');

		$user2 = new User();
		$user2->addRole('ROLE_SONATA_ADMIN')
			->setEmail('sample2@email.com');

		$user3 = new User();
		$user3->addRole('ROLE_ADMIN')
			->setEmail('sample3@email.com');

		$user4 = new User();
		$user4->addRole('ROLE_SONATA_NEWS_ADMIN_COMMENT_EDIT')
			->setEmail('sample4@email.com');

		$user5 = new User();
		$user5->addRole('ROLE_SONATA_NEWS_ADMIN_COMMENT_LIST')
			->setEmail('sample5@email.com');

		return array($user1, $user2, $user3, $user4, $user5);
    }

    public function testModeratorsEmailListIsReturned()
    {
    	$emails = $this->mailManager->getEmails();

    	$this->assertCount(4, $emails);
    }
}