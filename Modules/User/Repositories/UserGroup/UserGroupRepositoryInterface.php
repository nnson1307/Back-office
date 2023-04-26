<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/1/2019
 * Time: 4:57 PM
 */

namespace Modules\User\Repositories\UserGroup;


interface UserGroupRepositoryInterface
{
    public function list(array $filters = []);
    public function searchAllUser(array $filters = []);

    public function getCondition(array $arrayCondition = []);

    public function storeAuto(array $data = []);

    public function importExcel($file, $arrayPhoneExist);

    public function getItem($id);

    public function updateAuto(array $data = []);

    public function searchWhereInUser(array $data = []);

    public function getAllUser();

    public function addUserGroupDefine(array $data = []);

    public function storeUserGroupDefine(array $data = []);

    public function userGroupDefineDetail($id);

    public function updateUserGroupDefine(array $data = []);

    public function computeUserInUserGroupAuto(array $data = []);

    public function computeUserInvalid($id);
}