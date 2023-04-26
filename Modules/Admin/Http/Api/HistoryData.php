<?php


namespace Modules\Admin\Http\Api;


use MyCore\Api\ApiAbstract;

class HistoryData extends ApiAbstract
{
    public function getOption(array $data = [])
    {
        return $this->baseClient('/data/options', $data);
    }

    public function getOptionStation(array $data = [])
    {
        return $this->baseClient('/data/station-by-category', $data);
    }

    public function getParameterStation(array $data = [])
    {
        return $this->baseClient('/data/get-parameter-by-station', $data);
    }

    public function filterHistoryData(array $data = [])
    {
        return $this->baseClient('/data/history', $data, false);
    }

    public function getOptionByStation(array $data = [])
    {
        return $this->baseClient('/data/get-option-by-station', $data);
    }
}