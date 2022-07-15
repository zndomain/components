<?php

namespace ZnDomain\Сomponents\ArrayRepository\Helpers;

use ZnCore\Collection\Libs\Collection;
use ZnDomain\Entity\Helpers\CollectionHelper;
use ZnDomain\Query\Entities\Query;

class FilterHelper
{

    public static function filterItems(array $items, Query $query): array
    {
        $collection = new Collection($items);
        $collection = CollectionHelper::filterByQuery($collection, $query);
        return $collection->toArray();
    }
}
