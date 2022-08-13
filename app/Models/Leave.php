<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'employee_id',
        'from_date',
        'to_date',
        'leave_type',
        'reason',
        'status'
    ];

     public function employee()
    {
        return $this->hasOne('App\Models\User','id','employee_id');
    }
}
