<?php

namespace App\Http\Controllers;

use App\Order as Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::all();
        foreach ($orders as $order) {
            echo $order->name . " Ordered by " . $order->customer->name . "<br />";
        }
    }
}
