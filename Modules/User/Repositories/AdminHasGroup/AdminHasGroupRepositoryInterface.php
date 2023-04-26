<?php

namespace Modules\User\Repositories\AdminHasGroup;

interface AdminHasGroupRepositoryInterface
{
    /**
     * Phân nhóm quyền nhiều user
     *
     * @param array $data
     */
    public function addMultipleRecords(array $data);

    public function removeByUser($userId);
}
