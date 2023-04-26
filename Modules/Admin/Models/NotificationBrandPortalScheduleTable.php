<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class NotificationBrandPortalScheduleTable extends Model
{
    use ListTableTrait;
    protected $table = 'notification_brandportal_schedule';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'type',
        'option_type',
        'option_value',
        'message_title',
        'message_desc',
        'is_active',
        'updated_at',
        'updated_by',
    ];

    public function getList(){
        $oSelect = $this->get();
        return $oSelect;
    }

    public function updateBrandPortalSchedule($data){
            if ($data['send_order_flash_update'] == '0'){
                $oSelect = $this->where('type','send_order_flash_update')->update(['is_active' => $data['send_order_flash_update']]);
            }else{
                $oSelect = $this->where('type','send_order_flash_update')
                    ->update
                    (
                        [
                            'is_active' => $data['send_order_flash_update'],
                            'option_type' => $data['send_order_flash_update_time_type'],
                            'option_value' => $data['send_order_flash_update_value'],
                        ]
                    );
            }

            if ($data['send_cart_not_order'] == '0'){
                $oSelect = $this->where('type','send_cart_not_order')->update(['is_active' => $data['send_cart_not_order']]);
            }else{
                $oSelect = $this->where('type','send_cart_not_order')
                    ->update
                    (
                        [
                            'is_active' => $data['send_cart_not_order'],
                            'option_type' => $data['send_cart_not_order_time_type'],
                            'option_value' => $data['send_cart_not_order_value'],
                        ]
                    );
            }
    }

}