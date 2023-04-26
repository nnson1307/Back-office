<?php

namespace Modules\User\Repositories\AdminGroupMap;

interface AdminGroupMapRepositoryInterface
{
    /**
     * Thêm nhiều quan hệ nhóm quyền cha con
     *
     * @param array $data
     * @return void
     */
    public function addMultipleRecords(array $data);
}
