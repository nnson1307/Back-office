<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class S3UploadsRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setDiskTenantConfig($request);
        $redirectUrl = $this->modifyRedirect($request);
        if(is_null($redirectUrl)){
            return $next($request);
        }else{
//            return redirect($redirectUrl);
            return redirect()->route('admin.dashboard');
        }
    }
    private function modifyRedirect($request){
        $urlExp = explode("/",$request->getUri());
        // redirect here
        if(config("filesystems.disks.public.driver") == "s3"){
            if(count($urlExp) > 3){
                if(in_array($urlExp[3], explode("|",env('STORAGE_UPLOAD_PREFIX')))){
                    return $this->getRealPath($request->path());
                }
            }
        }
        return null;
    }
    private function setDiskTenantConfig($request){
        $AWS_ACCESS_KEY_ID = env('AWS_ACCESS_KEY_ID');
        $AWS_SECRET_ACCESS_KEY = env('AWS_SECRET_ACCESS_KEY');
        $AWS_DEFAULT_REGION = env('AWS_DEFAULT_REGION');
        $AWS_BUCKET = env('AWS_BUCKET');

        try{
            $awsS3 = [
                'driver' => 's3',
                'key' => $AWS_ACCESS_KEY_ID,
                'secret' => $AWS_SECRET_ACCESS_KEY,
                'region' => $AWS_DEFAULT_REGION,
                'bucket' => $AWS_BUCKET
            ];
        }catch(\Exception $e){
            Log::info($e);
        }
        config([
            'filesystems.disks.public' => env("STORAGE_TYPE", "") == "s3" ? ($awsS3 ?? [
                'driver' => 's3',
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
                'region' => env('AWS_DEFAULT_REGION'),
                'bucket' => env('AWS_BUCKET')    
            ]) : [
                'driver' => 'local',
                'root' => public_path(),
                'url' => env('APP_URL').'/storage',
                'visibility' => 'public',
            ]
        ]);
    }
    public function getRealPath($value){
        $disk = Storage::disk('public');

        if ($disk->exists($value)) {
            $url = $disk->getDriver()->getAdapter()->getClient()->getObjectUrl(config('filesystems.disks.public.bucket'), $value);
            return $url;
        }
        return $value;
    }	
}