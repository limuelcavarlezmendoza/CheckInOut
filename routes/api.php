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

//-------------------------------------------------------------------------------------
      // route for employee api/admin/~
      Route::group([
          'prefix' => 'employee'
      ], function () {
          //Route::post('register', '\AuthController@registerEmployee');
          Route::post('register', 'AuthController@registerEmployee');//done
      });
//-------------------------------------------------------------------------------------
      // route for admin api/superadmin/~
      Route::group([
          'prefix' => 'superadmin'
      ], function () {
          Route::put('status/{id}', 'SuperAdminController@statusChange');//make on/off admin status
          Route::get('admins', 'SuperAdminController@adminList');
          Route::post('makerole', 'SuperAdminController@makeRole');
          Route::post('deleterole', 'SuperAdminController@deleteRole');
      });
//-------------------------------------------------------------------------------------
      // route for admin api/admin/~
      Route::group([
          'prefix' => 'admin'
      ], function () {
          Route::put('register', 'AdminController@register');//register employee id with his/her Password
          Route::post('login', 'AdminController@login');
          Route::get('employees', 'AdminController@employeeList');//give list of employees
            // route for approving requests api/admin/aprprove/~
            Route::group([
                'prefix' => 'approve'
            ], function () {
                Route::put('employee/{id}', 'AdminController@approveEmployee');//done
                Route::put('leave/{id}', 'AdminController@approveLeave');
                Route::put('overtime/{id}', 'AdminController@approveOverTime');
                Route::put('officialbusiness/{id}', 'AdminController@approveOfficialBusiness');
                Route::put('schedule/{id}', 'AdminController@approveSchedule');
            });
//-------------------------------------------------------------------------------------
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
