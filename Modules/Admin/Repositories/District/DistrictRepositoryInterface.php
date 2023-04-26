<?php


namespace Modules\Admin\Repositories\District;


interface DistrictRepositoryInterface
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id);


    /**
     * @param $id_province
     * @return mixed
     */
    public function getDistrictOption($id_province);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id);
}