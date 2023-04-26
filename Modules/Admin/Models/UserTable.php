<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class UserTable extends Model
{
    use ListTableTrait;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_code',
        'fullname',
        'email',
        'phone',
    ];

    /**
     * Lấy tất cả
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->get();
    }
}
