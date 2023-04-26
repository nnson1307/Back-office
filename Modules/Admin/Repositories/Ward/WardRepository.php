<?php


namespace Modules\Admin\Repositories\Ward;


use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\WardTable;

class WardRepository implements WardRepositoryInterface
{
    protected $ward;
    protected $timestamps = true;

    /**
     * WardRepository constructor.
     * @param WardTable $ward
     */
    public function __construct(WardTable $ward)
    {
        $this->ward = $ward;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
        return $this->ward->getListNew($filters);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $data['name'] = strip_tags($data['name']);
        $data['ward_code'] = strip_tags($data['ward_code']);
        $data['type'] = strip_tags($data['type']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        return $this->ward->add($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->ward->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        $data['name'] = strip_tags($data['name']);
        $data['ward_code'] = strip_tags($data['ward_code']);
        $data['type'] = strip_tags($data['type']);
        $data['updated_by'] = Auth::id();
        return $this->ward->edit($data, $id);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
        return $this->ward->remove($id);
    }

    /**
     * @return array|mixed
     */
    public function getWardOption()
    {
        // TODO: Implement getWardOption() method.
        return $this->ward->getWardOption();
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        // TODO: Implement changeStatus() method.
        return $this->ward->changeStatus($data, $id);
    }

}