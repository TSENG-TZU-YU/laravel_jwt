<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_detail";

    public function user()
    {
        return $this->hasManyThrough(User::class, Order::class, 'order_no', 'id', 'order_no', 'user_id');
        // hasManyThrough(目標表,樞紐表,樞紐表和當前表的關聯,目標表和樞紐表的關聯,當前表與樞紐表的關聯,樞紐表和目標表的關聯)
        // (Order.order_no ,User.id , order_detail.order_no , Order.user_id  )
    }

    public function order()
    {

        return $this->belongsTo(Order::class, 'order_no', 'order_no');
    }
}