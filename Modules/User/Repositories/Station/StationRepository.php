<?php


namespace Modules\User\Repositories\Station;




use Modules\User\Models\StationTable;

class StationRepository implements StationRepositoryInterface
{
    protected $station;
    protected $timestamps = true;

    public function __construct(StationTable $station)
    {
        $this->station = $station;
    }

    /**
     * @return mixed
     */
    public function listAuthority()
    {
        // TODO: Implement listAuthority() method.
        return $this->station->listAuthority();
    }
}