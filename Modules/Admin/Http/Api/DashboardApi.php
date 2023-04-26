<?php


namespace Modules\Admin\Http\Api;


use MyCore\Api\ApiAbstract;

class DashboardApi extends ApiAbstract
{
    public function groupStationCategory(array $data=[])
    {
        return $this->baseClient('/dashboard/category',$data);
    }

    public function getChartConnect(array $data=[])
    {
        return $this->baseClient('dashboard/get-station-disconnect-by-user',$data);
    }

    public function getChartQcvnOver(array $data=[])
    {
        return $this->baseClient('/dashboard/get-station-qcvn-over-by-user',$data);
    }

    //Danh sách trạm theo user
    public function getStationByUser($data)
    {
        return $this->baseClient('/dashboard/get-list-station',$data);
    }

    //Danh sách trạm theo nhóm.
    public function getStationByCategory($data)
    {
        return $this->baseClient('/dashboard/category',$data);
    }

    //Danh sách trạm theo id nhóm.
    public function getStationByCategoryId($data)
    {
        return $this->baseClient('/dashboard/get-station-by-category-id',$data);
    }

    //Chi tiết trạm.
    public function detailStation($data)
    {
        return $this->baseClient('/station/detail',$data);
    }

    //option trạm
    public function getStationCategoryOption($data)
    {
        return $this->baseClient('/station/category-option',$data);
    }

    //option management unit.
    public function getManagementOption($data)
    {
        return $this->baseClient('/station/management-unit',$data);
    }

    public function chartDashboard(array $data=[])
    {
        return $this->baseClient('/dashboard/chart-dashboard',$data);
    }

    public function statisticalStationByStationConnect(array $data=[])
    {
        return $this->baseClient('/dashboard/statistical-station-by-station-connect',$data);
    }

    public function filterStationByStationConnect(array $data=[])
    {
        return $this->baseClient('/dashboard/filter-station-by-station-connect',$data);
    }
}