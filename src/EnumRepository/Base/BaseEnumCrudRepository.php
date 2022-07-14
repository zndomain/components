<?php

namespace ZnDomain\Сomponents\EnumRepository\Base;

use ZnCore\Enum\Helpers\EnumHelper;
use ZnDomain\Сomponents\ArrayRepository\Base\BaseArrayCrudRepository;

abstract class BaseEnumCrudRepository extends BaseArrayCrudRepository
{

    abstract public function enumClass(): string;

    protected function getItems(): array
    {
        return EnumHelper::getItems($this->enumClass());
    }
}
