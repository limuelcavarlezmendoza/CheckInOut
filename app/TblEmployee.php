<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblEmployee extends Model
{
  protected $fillable = [
      'employee_number', 'device_type', 'firebase_token', 'device_id', 'status',
      'is_registered',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'status'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function attendance()
  {
    return $this->hasOne('App\TblAttendance');
  }
}
