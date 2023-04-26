<?php
/**
 * Created by PhpStorm.
 * User: hacke
 * Date: 30/09/2019
 * Time: 3:11 CH
 */

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigNotificationTable extends Model
{
    protected $table = 'config_notification';
    protected $primaryKey = 'id';
    protected $fillable=[
        'id', 'name','type','notify_type', 'option_type', 'option_value',
        'message_title', 'message_desc', 'is_active', 'updated_at', 'updated_by'
    ];

    /**
     * Lấy config theo type
     *
     * @param $type
     * @return mixed
     */
    public function getConfigByType($type)
    {
        return $this->where('type', $type)->first();
    }
}