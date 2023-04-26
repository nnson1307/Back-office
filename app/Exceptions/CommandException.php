<?php
namespace App\Exceptions;

use Throwable;

/**
 * Created by PhpStorm.
 * User: phuoc
 * Date: 27/05/2019
 * Time: 3:38 PM
 */
class CommandException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}