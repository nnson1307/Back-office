<?php


namespace Modules\BrandApi\Repositories\Ward;

use Modules\BrandApi\Models\WardTable;
use MyCore\Repository\PagingTrait;

class WardRepository implements WardRepositoryInterface
{
    use PagingTrait;
    protected $ward;

    public function __construct(WardTable $ward)
    {
        $this->ward = $ward;
    }

    public function getWardOption($district_id)
    {
        $array = array();
        foreach ($this->ward->getWardOption($district_id) as $item) {
            $array[$item['ward_id']] = $item['type'] . ' ' . $item['name'];
        }
        return $array;
    }

    /**
     * Danh sách phường xã
     *
     * @param $input
     * @return array|mixed
     * @throws WardRepoException
     */
    public function getWards($input)
    {
        try {
            $data = $this->toPagingData($this->ward->getWards($input));

            return $data;
        } catch (\Exception $exception) {
            throw new WardRepoException(WardRepoException::GET_WARD_LIST_FAILED);
        }
    }

    /**
     * Chi tiết phường xã
     *
     * @param $wardId
     * @return mixed
     * @throws WardRepoException
     */
    public function getDetail($wardId)
    {
        try {
            $data = $this->ward->getInfo($wardId);

            return $data;
        } catch (\Exception $exception) {
            throw new WardRepoException(WardRepoException::GET_WARD_DETAIL_FAILED);
        }
    }

    /**
     * Kiểm tra phường xã
     *
     * @param $input
     * @return mixed
     * @throws WardRepoException
     */
    public function checkWard($input)
    {
        try {
            $data = $this->ward->checkWard($input['country_name'], $input['province_name'], $input['district_name'], $input['ward_name']);

            return $data;
        } catch (\Exception $exception) {
            throw new WardRepoException(WardRepoException::CHECK_WARD_FAILED);
        }
    }
}