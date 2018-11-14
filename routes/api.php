<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'api'
], function () {
      // route for admin api/superadmin/~
      Route::group([
          'prefix' => 'superadmin'
      ], function () {
          Route::post('status', 'SuperAdminController@status');//make on/off admin status
          Route::get('list/admins', 'SuperAdminController@adminList');
      });
      // route for admin api/admin/~
      Route::group([
          'prefix' => 'admin'
      ], function () {
          Route::put('register', 'AdminController@register');//register employee id with his/her Password
          Route::post('login', 'AdminController@login');
            // route for approving requests api/admin/aprprove/~
            Route::group([
                'prefix' => 'approve'
            ], function () {
                Route::put('leave', 'AdminController@approveLeave');
                Route::put('overtime', 'AdminController@approveOverTime');
                Route::put('officialbusiness', 'AdminController@approveOfficialBusiness');
                Route::put('schedule', 'AdminController@approveSchedule');
            });
      });
});

/*
Route::group([
    'prefix' => 'auth'
], function () {
    //Route::post('login', 'AuthController@login');
    //Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
    //Route::get('logout', 'AuthController@logout');
    //Route::get('user', 'AuthController@user');
    });
});
*/
