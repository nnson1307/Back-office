<?php
namespace DaiDP\StsSDK\HttpClient;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ClientAbstract
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
abstract class ClientAbstract
{
    protected $config;

    /**
     * UMClient constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Get httpClient request
     * @return Client
     */
    protected function getHttpClient()
    {
        return new Client([
            'base_uri'    => $this->config['base_uri'],
            'http_errors' => false
        ]);
    }

    /**
     * Parse response data
     *
     * @param ResponseInterface $response
     * @return ReponseData
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $isError = !in_array($response->getStatusCode(), [200, 201]);
        $rspData = json_decode($response->getBody()->getContents(), true);

        return new ReponseData($isError, $rspData);
    }
}