<?php


namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BrandApiTable extends Model
{

    use ListTableTrait;
    protected $table = 'brand_subscription';
    protected $primaryKey = 'brand_subscription_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_subscription_id', 'brand_id', 'user_id', 'sale_id',
        'brand_customer_code', 'brand_ship_to_code',
        'is_approved', 'approved_at', 'approved_by', 'store_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getAll(){
        return $this->get()->toArray();
    }

}