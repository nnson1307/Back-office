<?php
namespace DaiDP\StsSDK\HttpClient;

/**
 * Class ClientApi
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
class UMClient extends ClientAbstract
{
    /**
     * Gọi api post lấy dữ liệu
     *
     * @param $url
     * @param $data
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, $data)
    {
        $oClient = $this->getHttpClient();

        $oResponse = $oClient->request('POST', $url, [
            'json' => $data
        ]);

        return $this->parseResponse($oResponse);
    }

    /**
     * Gọi api liên quan nhóm token
     *
     * @param $url
     * @param $data
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function token($url, $data)
    {
        $oClient = $this->getHttpClient();

        $data['client_id']     = $this->config['client_id'];
        $data['client_secret'] = $this->config['client_secret'];

        $oResponse = $oClient->request('POST', $url, [
           'form_params' => $data
        ]);

        return $this->parseResponse($oResponse);
    }

    /**
     * Gọi api delete dữ liệu
     *
     * @param $url
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($url)
    {
        $oClient = $this->getHttpClient();

        $oResponse = $oClient->request('DELETE', $url);

        return $this->parseResponse($oResponse);
    }
}
