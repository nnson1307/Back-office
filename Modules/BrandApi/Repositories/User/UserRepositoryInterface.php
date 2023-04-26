<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/23/2019
 * Time: 3:38 PM
 */

namespace Modules\BrandApi\Repositories\User;


interface UserRepositoryInterface
{
    public function search(array $filters = []);
}