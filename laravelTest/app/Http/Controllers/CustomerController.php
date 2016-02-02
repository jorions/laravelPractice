<?php

namespace App\Http\Controllers;

// Used to specify which Customer we refer to below
use App\Customer as Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function show($id) {
        $customer = Customer::find($id);
        echo 'Hello my name is ' . $customer->name . "<br />";

        // added after creating relationship
        $orders = $customer->orders;
        foreach ($orders as $order) {
            echo $order->name . "<br />";
        }
    }

    public function get_customer() {

        $customer = Customer::where('name', '=', 'Tony')->first();

        echo $customer->id;
    }
}
