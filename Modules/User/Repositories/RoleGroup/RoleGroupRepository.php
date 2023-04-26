<?php


namespace Modules\User\Repositories\RoleGroup;

use Modules\User\Models\RoleGroupTable;

class RoleGroupRepository implements RoleGroupRepositoryInterface
{
    protected $role_group;
    protected $timestamps = true;

    public function __construct(RoleGroupTable $role_group)
    {
        $this->role_group = $role_group;
    }

    /**
     * @return mixed
     */
    public function getRoleOption()
    {
        // TODO: Implement getRoleOption() method.
        return $this->role_group->getRoleOption();
    }
}