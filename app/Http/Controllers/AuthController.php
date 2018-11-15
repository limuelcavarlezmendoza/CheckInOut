<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    public function loginEmployee(Request $request)
    {

    }
    public function registerEmployee(Request $request)
    {
      $request->validate([

         'employee_number' => 'required|string|unique:users,employee_number',
         'password' => 'required|string|confirmed',
         'device_type' => 'required|string',

      ]);

      $employee = new User([

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
