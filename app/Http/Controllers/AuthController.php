<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    public function registerEmployee(Request $request)
    {
      $request->validate([
        'employee_number' => 'required|string',
        'fullname' => 'required|string',
        'birthday' => 'required|date_format:Y-m-d',
        'email' => 'required|email',
        'position' => 'required|string',
        'employment_status' => 'required|string',
        'civil_status' => 'required|string',
        'device' => 'required|string',
        //'device_token' => 'required|string' not required yet.
        //'device_id' => 'required' not required yet
        'date_started' => 'required|string',
        //'status' => 'required|string' i dont know if employee will need to provide
        'contact_person' => 'required|string',
        'contact_person_no' => 'required|numeric'
      ]);

      $employee = new User([
        'employee_number' => $request->employee_number,
        'fullname' => $request->fullname,
        'birthday' => $request->birthday,
        'email' => $request->email,
        'position' => $request->position,
        'employment_status' => $request->employment_status,
        'civil_status' => $request->civil_status,
        'device' => $request->device,
        //'device_token' => $request->device_token not required yet.
        //'device_id' => $request->device_id not required yet
        'date_started' => $request->date_started,
        //'status' => $request->status i dont know if employee will need to provide
        'contact_person' => $request->contact_person,
        'contact_person_no' => $request->contact_person_no
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
