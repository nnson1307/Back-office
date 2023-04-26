<?php


namespace Modules\BrandApi\Repositories\User;


use Modules\BrandApi\Models\DistrictTable;
use Modules\BrandApi\Models\UserTable;
use MyCore\Http\Response\ResponseFormatTrait;

class UserRepository implements UserRepositoryInterface
{
    use ResponseFormatTrait;
    protected $user;

    public function __construct(UserTable $user)
    {
        $this->user = $user;
    }

    public function search(array $filters = [])
    {
        $result = $this->user->search($filters);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }
}