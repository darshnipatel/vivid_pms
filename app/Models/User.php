<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'company','job_post', 'phone' , 'date_of_join', 'birthdate', 'address', 'gender', 'nationality', 'religion','marital_status','emergency_contact_name', 'emergency_contact_relationship', 'emergency_contact_phone', 'bank_name', 'bank_account_no', 'IFSC_code', 'PAN_no' ,'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function checkIn()
    {
        date_default_timezone_set("Asia/Kolkata");
        $now = $this->freshTimestamp();
        return $this->attendances()->create([
            'user_id' => Auth()->user()->id,
            'day' => $now->format('Y-m-d'),
            'punch_in' => $now->format('g:i a')
        ]);
    }

    public function checkOut()
    {
        date_default_timezone_set("Asia/Kolkata");
        $now = $this->freshTimestamp();
        return $this->attendances()
                    ->where('day', $now->format('Y-m-d'))
                    ->whereNull('punch_out')
                    ->firstOrFail()
                    ->update([
                        'punch_out' => $now->format('g:i a'),
                    ]);
    }
}