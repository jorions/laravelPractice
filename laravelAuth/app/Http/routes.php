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

use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', function () {
        return view('welcome');
    });

    /* ################ FORM SUBMISSION EXAMPLE ################# */
    Route::get('form', function() {
        return view('form');
    });

    Route::post('post_to_me', function(Request $request) {
        $name = $request->input('name');
        echo 'You entered ' . $name . '<br />';

        //Alternatively could say...
        $input = $request->all();
        print_r($input);
    });
    /* ############## END FORM SUBMISSION EXAMPLE ############### */

});

Route::get('admin', ['middleware' => 'admin', function () {
    echo "Welcome to your admin page!";
}]);