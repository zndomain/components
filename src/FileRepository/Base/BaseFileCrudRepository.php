<?php

namespace ZnDomain\Сomponents\FileRepository\Base;

use ZnCore\DotEnv\Domain\Libs\DotEnv;
use ZnCore\Query\Entities\Query;
use ZnDomain\Repository\Interfaces\CrudRepositoryInterface;
use ZnDomain\Сomponents\ArrayRepository\Traits\ArrayCrudRepositoryTrait;
use ZnLib\Components\Store\StoreFile;

abstract class BaseFileCrudRepository extends BaseFileRepository implements CrudRepositoryInterface
{

    use ArrayCrudRepositoryTrait;

    public function directory(): string
    {
        return DotEnv::get('FILE_DB_DIRECTORY');
    }

    public function fileExt(): string
    {
        return 'php';
    }

    protected function forgeQuery(Query $query = null): Query
    {
        $query = Query::forge($query);
        return $query;
    }

    public function fileName(): string
    {
        $tableName = $this->tableName();
//        $root = FilePathHelper::rootPath();
        $directory = $this->directory();
        $ext = $this->fileExt();
        $path = "$directory/$tableName.$ext";
        return $path;
    }

    protected function getItems(): array
    {
        $store = new StoreFile($this->fileName());
        return $store->load() ?: [];
    }

    protected function setItems(array $items)
    {
        $store = new StoreFile($this->fileName());
        $store->save($items);
    }
}
