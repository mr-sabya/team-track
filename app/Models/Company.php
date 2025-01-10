<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'trade_license',
        'establishment_card',
        'vehicle',
        'domain_subscriptions',
        'tenancy_agreement',
        'electricity_bills',
        'wifi_bills',
        'sewerage_bills',
        'mobile_bills',

        'logo',
        'email',
        'phone',
        'address',
        'salution',
        'signature',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
