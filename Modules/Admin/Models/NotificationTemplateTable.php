<?php

namespace Modules\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class NotificationTemplateTable extends Model
{
    use ListTableTrait;
    protected $table = 'notification_template';
    public $timestamps = false;
    protected $primaryKey = 'notification_template_id';
    protected $fillable=[
        'notification_detail_id', 'title', 'title_short', 'description', 'notification_type_id',
        'action_group', 'action_name', 'from_type', 'send_type', 'send_at',
        'schedule_option', 'schedule_value', 'schedule_value_type', 'is_actived', 'send_status', 'from_type_object'
    ];

    /**
     * 1-1 với template
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detail()
    {
        return $this->belongsTo(
            'Modules\Admin\Models\NotificationDetailTable',
            'notification_detail_id',
            'notification_detail_id'
        );
    }

    /**
     * 1-1 với queue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function queue()
    {
        return $this->belongsTo(
            'Modules\Admin\Models\NotificationQueueTable',
            'notification_detail_id',
            'notification_detail_id'
        );
    }

    /**
     * Insert thông báo
     *
     * @param $data
     * @return mixed
     */
    public function createNotiTemplate($data)
    {
        return $this->create($data);
    }

    /**
     * Cập nhật thông báo
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateNotiTemplate($id, $data)
    {
        return $this->where('notification_detail_id', $id)->update($data);
    }

    /**
     * Xóa
     *
     * @param $id
     * @return mixed
     */
    public function deleteNotiTemplate($id)
    {
        return $this->where('notification_detail_id', $id)->delete();
    }

    /**
     * Lấy chi tiết theo notification detail id
     *
     * @param $detail_id
     * @return mixed
     */
    public function getOneByDetailId($detail_id)
    {
        return $this->where('notification_detail_id', $detail_id)->first();
    }

    public function getList($filter = [])
    {
        $oSelect = $this->select('notification_template.*','notification_queue.id as queue_id',
            'notification_queue.send_at as queue_send_at')
            ->join('notification_detail',
                'notification_detail.notification_detail_id','=','notification_template.notification_detail_id')
            ->leftJoin('notification_queue',
                'notification_queue.notification_detail_id','=','notification_template.notification_detail_id');

        if (isset($filter['title']) && $filter['title'] != null) {
            $title = $filter['title'];
            $oSelect->where('title', 'like', '%'.$title.'%');
            unset($filter['title']);
        }
//
        if (isset($filter['is_actived']) && $filter['is_actived'] != null && $filter['is_actived'] != -1) {
            $isActived = $filter['is_actived'];
            $oSelect->where('notification_template.is_actived', $isActived);
            unset($filter['is_actived']);
        }

        if (isset($filter['send_time']) && $filter['send_time'] != null) {
            $arrTime = explode(" / ", $filter['send_time']);
            $from = Carbon::parse($arrTime[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($arrTime[1])->format('Y-m-d H:i:s');
            $oSelect->whereBetween('send_at', [$from, $to]);
            unset($filter['send_time']);
        }

        if (isset($filter['is_send']) && $filter['is_send'] != null && $filter['is_send'] != -1) {
            $isSend = $filter['is_send'];
            if ($isSend == 'sent') { // đã gửi
                $oSelect->where('notification_template.is_actived', 1);
            } elseif ($isSend == 'pending') { // chờ gửi
                $oSelect->where('notification_template.is_actived', 1);
                $oSelect->whereHas('queue', function ($query) {
                    $query->where('id', '!=', 0);
                });
            } else { // chưa gửi
                $oSelect->where('notification_template.is_actived', 0);
            }
            unset($filter['is_send']);
        }
        if (isset($filter['tenant_id'])) {
            $oSelect->where('notification_detail.tenant_id', $filter['tenant_id']);
        }

        $display = (isset($filter['perpage'])) ? $filter['perpage'] : NOTIFICATION_PAGING;
        $page = (isset($filter['page'])) ? $filter['page'] : 1;
        unset($filter['perpage'], $filter['page']);

        return $oSelect->where('notification_detail.is_brand', $filter['is_brand'])
            ->orderBy('notification_detail.updated_at', 'DESC')->paginate(
                $display,
                ['*'],
                'page',
                $page
            );
    }
}
