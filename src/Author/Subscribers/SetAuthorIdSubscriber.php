<?php

namespace ZnDomain\Сomponents\Author\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use ZnCore\Code\Helpers\PropertyHelper;
use ZnDomain\Domain\Enums\EventEnum;
use ZnDomain\Domain\Events\EntityEvent;
use ZnDomain\Entity\Interfaces\EntityIdInterface;
use ZnUser\Authentication\Domain\Interfaces\Services\AuthServiceInterface;

class SetAuthorIdSubscriber implements EventSubscriberInterface
{

    private $authService;
    private $attribute;

    public function __construct(
        AuthServiceInterface $authService
    )
    {
        $this->authService = $authService;
    }

    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    public static function getSubscribedEvents()
    {
        return [
            EventEnum::BEFORE_CREATE_ENTITY => 'onCreateComment'
        ];
    }

    public function onCreateComment(EntityEvent $event)
    {
        /** @var EntityIdInterface $entity */
        $entity = $event->getEntity();
        $identityId = $this->authService->getIdentity()->getId();
        PropertyHelper::setAttribute($entity, $this->attribute, $identityId);
    }
}
