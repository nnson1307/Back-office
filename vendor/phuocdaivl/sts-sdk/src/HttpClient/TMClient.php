<?php
namespace DaiDP\StsSDK\HttpClient;

/**
 * Class TMClient
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
class TMClient extends ClientAbstract
{
    /**
     * Gọi api post lấy dữ liệu
     *
     * @param $url
     * @param array $data
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, array $data = [])
    {
        $oClient = $this->getHttpClient();

        $oResponse = $oClient->request('POST', $url, [
            'json' => $data
        ]);

        return $this->parseResponse($oResponse);
    }

    /**
     * Gọi api lấy dữ liệu
     *
     * @param $url
     * @param array $data
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($url, array $data = [])
    {
        $oClient = $this->getHttpClient();

        $oResponse = $oClient->request('GET', $url, [
            'query' => $data
        ]);

        return $this->parseResponse($oResponse);
    }
}