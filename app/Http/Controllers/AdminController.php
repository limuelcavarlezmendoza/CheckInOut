<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class AdminController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware(['role:admin']);
  // }
    public function adminRegister(Request $request)
    {
      $request->validate([
        'employee_number' => 'required|string',
        'password' => 'required|string'
      ]);
      $employee = \App\TblEmployee::where('employee_number', $request->employee_number)->firstOrFail();

      $user = new User([
        'employee_id' => $employee->id,
        'password' => bcrypt($request->password)
      ]);
      $user->save();

      return response()->json([
        'message' => 'Admin registered'
      ]);
    }
    public function adminLogin(Request $request)
    {
      $request->validate([
        'employee_number' => 'required|string',
        'password' => 'required|string'
      ]);
      $employee = \App\TblEmployee::where('employee_number', $request->employee_number)->firstOrFail();
      $employeeId = $employee->id;
      $password = $request->password;
      if(!Auth::attempt(['employee_id' => $employeeId, 'password' => $password]))
        return response()->json([
          'message' => 'unauthorized'
        ]);

      $user = $request->user();

      $tokenResult = $user->createToken('Personal Access Token');
      $token = $tokenResult->token;

      $token->save();

      return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
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
