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
      // route for employee api/employee/~
      Route::group([
          'prefix' => 'employee'
      ], function () {
          //Route::post('login', 'EmployeeController@loginEmployee');
          Route::post('register', 'EmployeeController@registerEmployee');//done
      });
//-------------------------------------------------------------------------------------
      // route for admin api/superadmin/~
      Route::group([
          'prefix' => 'superadmin'
      ], function () {
          Route::put('status/{id}', 'SuperAdminController@statusChange');//done
          Route::get('admins', 'SuperAdminController@adminList');//done
          Route::post('makerole', 'SuperAdminController@makeRole');//done
          Route::post('deleterole', 'SuperAdminController@deleteRole');//done
      });
//-------------------------------------------------------------------------------------
      // route for admin api/admin/~
      Route::group([
          'prefix' => 'admin'
      ], function () {
          Route::post('register', 'AdminController@adminRegister');//register employee id with his/her Password
          Route::post('login', 'AdminController@adminLogin');
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
