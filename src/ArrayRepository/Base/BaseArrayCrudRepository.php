<?php

namespace ZnDomain\Сomponents\ArrayRepository\Base;

use ZnDomain\Repository\Base\BaseRepository;
use ZnDomain\Repository\Interfaces\CrudRepositoryInterface;
use ZnDomain\Сomponents\ArrayRepository\Traits\ArrayCrudRepositoryTrait;

abstract class BaseArrayCrudRepository extends BaseRepository implements CrudRepositoryInterface
{

    use ArrayCrudRepositoryTrait;
}
