<?php
namespace DaiDP\StsSDK\HttpClient;

/**
 * Class ReponseData
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
class ReponseData
{
    public $error;
    public $data;

    /**
     * ReponseData constructor.
     * @param $error
     * @param $data
     */
    public function __construct($error, $data)
    {
        $this->error = $error;
        $this->data  = $data;
    }
}