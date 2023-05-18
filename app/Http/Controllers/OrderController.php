<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function list(Request $request)
    {
        $param = $request->all();

        // $data = Order::list($param)->with([
        //     'user:id,name',
        //     'orderDetail' => function ($query) {
        //         $query->with('user'); //拿取全部資料
        //     }
        // ])->get();

        $data = Order::list($param)->with([
            'user:id,name',
            'orderDetail' => function ($query) {
                $query->with(['user' => function ($query) {
                    $query->select('users.id', 'name','email'); //id 有多個所以要指定是哪個表格
                }]);
            }
        ])->get();
        // $data = Order::with('order_detail')->get();


        return  $data;
    }
}