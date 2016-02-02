<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* ####################### ROUTES EXAMPLE ####################### */
Route::get('hello/{name}', function($name) {
    echo 'Hello there ' . $name;
});

// create an item
Route::post('test', function() {
    echo 'POSTED';
});

// read or display an item
Route::get('test', function() {
    echo '<form action="test" method="POST">';
    echo '<input type="submit" value="submit">';
    echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    echo '<input type="hidden" name="_method" value="PUT">';
    echo '</form>';
});

// update an item
Route::put('test', function() {
   echo 'PUT';
});

// delete an item
Route::delete('test', function() {
   echo 'DELETE';
});
/* #################### END ROUTES EXAMPLE #################### */




/* ####################### MODELS EXAMPLE ##################### */

/* COMMENTED OUT BECAUSE NEW ROUTE USING CONTROLLERS IS MADE BELOW

Route::get('customer/{id}', function($id) {
    // find(1) finds the row where the id = 1, etc
    // putting ($id) in the function definition above enables it to be used in the method
    $customer = App\Customer::find($id);
    echo 'Hello my name is ' . $customer->name . "<br />";

    // added after creating relationship
    $orders = $customer->orders;
    foreach($orders as $order) {
        echo $order->name . "<br />";
    }

});

Route::get('get_customer', function() {
    $customer = App\Customer::where('name', '=', 'Tony')->first();

    echo $customer->name;
});
/* ##################### END MODELS EXAMPLE ################### */




/* #################### RELATIONSHIPS EXAMPLE ################# */

/* COMMENTED OUT BECAUSE NEW ROUTE USING CONTROLLERS IS MADE BELOW

Route::get('orders', function() {
    $orders = App\Order::all();
    foreach($orders as $order) {
        //APPROACH WITHOUT RELATIONSHIPS
        //$customer = App\Customer::find($order->customer_id);
        // echo $order->name . " Ordered by " . $customer->name . "<br />";

        //APPROACH WITH RELATIONSHIPS
        echo $order->name . " Ordered by " . $order->customer->name . "<br />";
    }
});

/* ################## END RELATIONSHIPS EXAMPLE ############### */




/* ####################### VIEWS EXAMPLE ###################### */
Route::get('mypage', function() {

    $customers = App\Customer::all();

    $data = array(
        'customers' => $customers
    );

    return view('mypage', $data);
});
/* ##################### END VIEWS EXAMPLE #################### */




/* #################### CONTROLLERS EXAMPLE ################### */
Route::get('customer/{id}', 'CustomerController@show');

Route::get('get_customer', 'CustomerController@get_customer');

Route::get('orders', 'OrderController@index');
/* ################## END CONTROLLERS EXAMPLE ################# */



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});