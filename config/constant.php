<?php

define('PAGING_ITEM_PER_PAGE', 50);
define('LOGIN_HOME_PAGE', 'admin.dashboard');
define('TEMP_PATH', 'temp_upload');
define('USER_PATH', 'uploads/user/');
define('IMPORT_DATA_STATION', 'uploads/admin/import-data-station/');
define('ROW_IMPORT', 1000);
define('BRAND_PATH', 'uploads/brand/');
define('CODE_SUCCESS', '');
define('CODE_FAILED', 1);
define('PIOSPA_QUEUE_URL', env('PIOSPA_QUEUE_URL'));

// Minh
define('END_POINT_PAGING', 5);
define('NOTIFICATION_PAGING', 50);

//Upload Azure
define('CONTAINER_NAME', 'images'); // Blob container

if (! function_exists('subString')) {
    function subString($value, $limit = 50, $end = '...')
    {
        return \Illuminate\Support\Str::limit($value, $limit, $end);
    }
}
