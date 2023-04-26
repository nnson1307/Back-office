<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class ConfigNotificationBackofficeTable extends Model
{
    use ListTableTrait;
    protected $table = 'config_notification';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'type',
        'notify_type',
        'option_type',
        'option_value',
        'message_title',
        'message_desc',
        'is_active',
        'updated_at',
        'updated_by',
    ];

    public function getDetailSendNotification()
    {
        $oSelect = $this->get();
        return $oSelect;
    }
    public function updateSendNoti($key, $filte)
    {
        $oSelect = $this->where('type', $key)->update($filte);
        return $oSelect;
    }
}
