<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware(['role:admin']);
  // }
    //test
    public function adminLogin(Request $request)
    {
      $request->validate([
        ''
      ]);
    }

    public function employeeList()
    {
      $data = \App\User::orderBy('id', 'DESC')->paginate(5);

        return response()->json([
          'message' => $data
        ]);
    }

    public function approveEmployee(Request $request, $id)
    {
      $employee = \App\User::findOrFail($id);

      if($employee->status==='active')
        {
          return response()->json([
            'message' => 'This Employee is already active.'
          ]);
        }
      $employee->status = 'active';
      $employee->save();

      return response()->json([
        'message' => 'Employee approved!'
      ]);
    }
}
