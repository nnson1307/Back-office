<?php


namespace Modules\User\Repositories\UserStation;


use Modules\User\Models\UserStationTable;

class UserStationRepository implements UserStationRepositoryInterface
{
    protected $user_station;
    protected $timestamps = true;

    public function __construct(UserStationTable $user_station)
    {
        $this->user_station = $user_station;
    }

    public function getItemUser($id_user,$id_station)
    {
        // TODO: Implement getAllUser() method.
        return $this->user_station->getItemUser($id_user,$id_station);
    }

    public function add(array $data)
    {
        // TODO: Implement add() method.
        return $this->user_station->add($data);
    }

    public function remove($id_user,$id_station)
    {
        // TODO: Implement remove() method.
        return $this->user_station->remove($id_user,$id_station);
    }
}