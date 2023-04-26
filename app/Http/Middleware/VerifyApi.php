<?php

namespace App\Http\Middleware;

use Closure;
use \MyCore\Http\Response\ResponseFormatTrait;

class VerifyApi
{
    use ResponseFormatTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->bearerToken();
        if ($header !== env('TOKEN_API_BACKOFFICE')) {
            return $this->responseJson(CODE_FAILED, 'Permission denied');
        }

        return $next($request);
    }
}
