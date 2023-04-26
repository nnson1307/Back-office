<?php
namespace DaiDP\StsSDK\HttpClient;

use Throwable;

/**
 * Class HttpClientException
 * @package DaiDP\StsSDK\HttpClient
 * @author DaiDP
 * @since Sep, 2019
 */
class HttpClientException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}