<?php

namespace ZnDomain\Сomponents\SoftDelete\Traits\Service;

use ZnLib\Components\Status\Enums\StatusEnum;

trait SoftDeleteTrait
{

    public function deleteById($id)
    {
        $entity = $this->findOneById($id);
        $entity->delete();
        $this->getRepository()->update($entity);
        return true;
    }
}
