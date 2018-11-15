<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblAttendance extends Model
{
  protected $fillable = [
    'status', 'action', 'latitude', 'longitude', 'device_datetime',
    'server_datetime', 'server_datetime', 'timezone', 'remarks', 'work_status',
  ];

  protected $hidden = [
    'status'
  ];

  public function employee()
  {
    return $this->belongsTo('App\TblEmployee');
  }
}
