<?php


namespace Modules\BrandApi\Repositories\Ward;

interface WardRepositoryInterface
{
    /**
     * @param $id_province
     * @return mixed
     */
    public function getWardOption($district_id);

    /**
     * Danh sách phường xã
     *
     * @param $input
     * @return mixed
     */
    public function getWards($input);

    /**
     * Chi tiết phường xã
     *
     * @param $wardId
     * @return mixed
     */
    public function getDetail($wardId);

    /**
     * Kiểm tra phường xã
     *
     * @param $input
     * @return mixed
     */
    public function checkWard($input);
}