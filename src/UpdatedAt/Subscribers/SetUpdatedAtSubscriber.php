<?php

namespace ZnDomain\Сomponents\UpdatedAt\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use ZnDomain\Domain\Enums\EventEnum;
use ZnDomain\Domain\Events\EntityEvent;

class SetUpdatedAtSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
//            EventEnum::BEFORE_CREATE_ENTITY => 'onBeforePersist',
            EventEnum::BEFORE_UPDATE_ENTITY => 'onBeforePersist',
        ];
    }

    public function onBeforePersist(EntityEvent $event)
    {
        $entity = $event->getEntity();
        $entity->setUpdatedAt(new \DateTime());
    }
}
