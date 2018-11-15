<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\TblEmployee;

class EmployeeController extends Controller
{
    public function loginEmployee(Request $request)
    {

    }
    public function registerEmployee(Request $request)
    {
      $request->validate([

         'employee_number' => 'required|string|unique:TblEmployees,employee_number',
         'device_type' => 'required|string',
      ]);
      //$ship->find(1)->captain()->save(new Captain(array('name' => 'jean Luc Picard')));
      $employee = new \App\TblEmployee([
        'employee_number' => $request->employee_number,
        'device_type' => $request->device_type,
        'status' => 'waiting'
      ]);

      $employee->save();

      return response()->json([
        'message' => 'User Successfully Created!'
      ]);
    }
    /*
    'employee_number', 'fullname', 'birthday', 'email', 'position', 'employment_status',
    'civil_status', 'device', 'device_token', 'device_id' ,'date_started', 'status', 'contact_person',
    'contact_person_no',
    */










}
