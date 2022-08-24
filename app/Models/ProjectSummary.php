<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'project_id',
        'date',
        'details',
        'hours'
    ];
    public function project()
    {
        return $this->hasOne('App\Models\Project','id','project_id');
    }
}
