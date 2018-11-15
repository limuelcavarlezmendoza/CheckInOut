<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;

class SuperAdminController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware(['role:superAdmin']);
    // }

    public function adminList()
    {
      $users = \App\User::role('admin')->orderBy('id', 'DESC')->paginate(5);

      return response()->json([
        'message' => $users
      ]);
    }
    public function makeRole(Request $request)
    {
      $inputRole = $request->role;
      $request->validate([
        'role' => 'required|string|confirmed|unique:roles,name'
      ]);
      $role = Role::create(['name' => $request->role]);
      return response()->json([
        'message' => 'New Role has been made.',
        'role' => $inputRole
      ]);

    }
    public function statusChange($id)
    {
      $employee = \App\User::findOrFail($id);
      if($employee->hasRole('admin'))
      {
        $employee->removeRole('admin');
        return response()->json([
          'message' => 'Admin status removed.'
        ]);
      }
      $employee->assignRole('admin');

      return response()->json([
        'message' => 'Admin status given!'
      ]);

      //$employee->assignRole('admin');
      //$user->removeRole('writer');
      //$user->hasRole('writer');
    }
}
