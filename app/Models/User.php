<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'email_verified_at',
        'password',


        'country_id',
        'date_of_birth',
        'gender',
        'phone',
        'address',
        'image',

        // user
        'is_superadmin',
        'is_admin',

        // company
        'is_company',
        'is_employee',
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
        'password' => 'hashed',

        'company_id' => 'integer',  // Ensure it's always treated as an integer
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // user visa
    public function visa()
    {
        return $this->hasOne(Visa::class, 'user_id');
    }

    //user passport
    public function passport()
    {
        return $this->hasOne(Passport::class, 'user_id');
    }


    // user vehicle
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'user_id');
    }

    // user driving-license
    public function drivingLicense()
    {
        return $this->hasOne(DrivingLicense::class, 'user_id');
    }

    // user emirates info
    public function emiratesInfo()
    {
        return $this->hasOne(EmiratesInfo::class, 'user_id');
    }

    // user isurance info
    public function insuranceInfo()
    {
        return $this->hasOne(InsuranceInfo::class, 'user_id');
    }

    // user isurance info
    public function extras()
    {
        return $this->hasOne(UserExtra::class, 'user_id');
    }

    /**
     * Get the user's setting.
     */
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
