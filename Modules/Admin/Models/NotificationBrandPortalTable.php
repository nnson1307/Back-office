<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class NotificationBrandPortalTable extends Model
{
    use ListTableTrait;
    protected $table = 'notification_brandportal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'type',
        'message_title',
        'message_desc',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function getList(){
        $oSelect = $this->get();
        return $oSelect;
    }

    public function updateBrandPortal($data){
        $oSelect = $this;
        foreach ($data as $key => $value){
            $oSelect->where('type',$key)->update(['is_active' => $value]);
        }
    }
}