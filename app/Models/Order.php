<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";


    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');//order.user_id , user.id
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_no', 'order_no');//Order_detail.order_no , order.order_no
    }


    public static function list($param)
    {
        $query = static::query();
        return $query;
    }
}