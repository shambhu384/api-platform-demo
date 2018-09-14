<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Player;
use Psr\Log\LoggerInterface;

class MatchEventSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $player = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if(!$player instanceof Player || $method !== 'POST') {
            return;
        }

        $this->logger->info('New Player registered');
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => [['onKernelView', EventPriorities::POST_VALIDATE]]
        ];
    }
}
