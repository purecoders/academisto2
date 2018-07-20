<?php

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

use App\Ad;
use App\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/check', function () {
  $roles = User::find(1)->roles;
  foreach ($roles as $role){
    echo $role;
  }
});


Route::get('/middle', ['middleware'=>'admin',function () {

}]);


Route::get('/a', function () {
//  $photos = Ad::findOrFail(1)->photos;
//  foreach ($photos as $photo){
//    echo $photo;
//  }
//  $payment = Ad::find(1)->payment;
//
//  echo $payment;


  date_default_timezone_set('Asia/Tehran');
  $date = date('Y_m_d__h_i_s__a', time());

  $year_dir = date('Y', time());
  $month_dir = date('m', time());
  $day = date('d', time());
  $hour = date('h', time());
  $minute = date('i', time());
  $second = date('s', time());

  echo $minute;

})->middleware('admin');

Route::resource('/ad','AdController');
Route::resource('/city','CityController');
Route::resource('/cv','CvController');
Route::resource('/project','ProjectController');
Route::resource('/project-request','ProjectRequestController');
Route::resource('/report','ReportController');
Route::resource('/site-pay','SitePayController');
Route::resource('/ticket','TicketController');
Route::resource('/user','UserController');
Route::resource('/user-full-info','UserFullInformationController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');




Route::get('/user-panel',['middleware'=>'auth', function (){
  //echo 'user panel';
  return view('user_panel_view');
}]);




Route::get('/super-admin-panel', function (){
  //echo 'admin panel';
})->middleware(['auth', 'super_admin']);

