<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class NotificationTable extends Model
{
    use ListTableTrait;
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    protected $fillable=[
        'notification_detail_id', 'tenant_id','brand_id','user_id', 'notification_avatar', 'notification_title',
        'notification_message', 'notification_type_id', 'is_read', 'is_brand', 'created_at', 'updated_at'
    ];

    /**
     * Danh sách đã click thông báo
     *
     * @return mixed
     */
    public function getListIsRead($filter)
    {
        $oSelect = $this->selectRaw('count(*) as total_is_read, notification_detail_id')
            ->where('is_read', 1)
            ->groupBy('notification_detail_id');

        if (isset($filter['tenant_id'])) {
            $oSelect->where('tenant_id', $filter['tenant_id']);
        }
        return $oSelect->get();
    }

    /**
     * Danh sách đã gửi
     *
     * @return mixed
     */
    public function getListIsSend($filter)
    {
        $oSelect = $this->selectRaw('count(*) as total_is_send, notification_detail_id')
            ->groupBy('notification_detail_id');

        if (isset($filter['tenant_id'])) {
            $oSelect->where('tenant_id', $filter['tenant_id']);
        }
        return $oSelect->get();
    }

    public function getFirst($detail_id)
    {
        return $this->where('notification_detail_id', $detail_id)->first();
    }

    public function getAllByDetailTemplate($arrId)
    {
        $result = $this
            ->select('notification_detail_id')
            ->selectRaw('SUM(CASE WHEN is_read=1 THEN 1 ELSE 0 END) as is_read')
            ->selectRaw('SUM(CASE WHEN is_read=0 THEN 1 ELSE 0 END) as is_not_read')
            ->selectRaw('COUNT(*) as total')
            ->whereIn('notification_detail_id', $arrId)
            ->groupBy('notification_detail_id')->get();
        if($result->count()){
            return $result->keyBy('notification_detail_id')->toArray();
        }
        return [];
    }
}
