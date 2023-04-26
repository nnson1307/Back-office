<?php

namespace Modules\User\Repositories\AdminGroupMap;

use Modules\User\Models\AdminGroupMapTable;

class AdminGroupMapRepository implements AdminGroupMapRepositoryInterface
{
    /**
     * @var AdminGroupMapTable
     */
    protected $adminGroupMap;

    public function __construct(AdminGroupMapTable $adminGroupMap)
    {
        $this->adminGroupMap = $adminGroupMap;
    }

    /**
     * Thêm nhiều quan hệ nhóm quyền cha con
     *
     * @param array $data
     * @return void
     */
    public function addMultipleRecords(array $data)
    {
        $this->adminGroupMap->addMultipleRecords($data);
    }
}
