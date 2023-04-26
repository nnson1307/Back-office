<?php


namespace Modules\User\Repositories\UserStation;


interface UserStationRepositoryInterface
{
    public function getItemUser($id_user,$id_station);

    public function add(array $data);

    public function remove($id_user,$id_station);
}