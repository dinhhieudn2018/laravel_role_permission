<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Nexmo\Laravel\Facade\Nexmo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin/login', 'admin.login')->name('admin.get.login');
Route::post('/admin/login', 'AdminController@login')->name('admin.post.login');
Route::post('admin/logout','AdminController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'web']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
});

//Route::group(['middleware' => ['auth', 'web']], function() {
//    Route::resource('roles', 'RoleController');
//    Route::resource('users', 'UserController');
//    Route::resource('products', 'ProductController');
//});


// Route::get('/send-sms', function() {
//     try {
//         $nexmo = app('Nexmo\Client');
//         $nexmo->message()->send([
//             'to'   => '84348650114',
//             'from' => 'Vonage SMS API',
//             'text' => 'This is message from Laravel'
//         ]);
//         echo 'done';
//         Log::info("success");
//     } catch (\Throwable $th) {
//         Log::error($th->getMessage());
//     }

// });
