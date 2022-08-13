<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'project_name',
        'start_date',
        'end_date',
        'client_id',
        'rate',
        'type',
        'employee_id',
        'technology',
        'priority',
        'attached_files',
        'description',
        'status'
    ];
    public function employee()
    {
        return $this->hasOne('App\Models\User','id','employee_id');
    }
    public function client()
    {
        return $this->hasOne('App\Models\Client','id','client_id');
    }
}
