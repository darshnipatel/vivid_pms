<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'present',
        'day',
        'punch_in',
        'punch_out',
    ];
    public function employee()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
