<?php
namespace Application\Sonata\NewsBundle\Tests\Mail;

use Application\Sonata\NewsBundle\Mail\MailManager;

class MailManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $mailManager;

    public function setUp()
    {
        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $this->$mailManager = new MailManager($container);
    }
}