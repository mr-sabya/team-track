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
        'website', // Add website to the fillable fields
        'employee_count', // Add employee_count to the fillable fields
        'subscription_plan_id', // Add subscription_plan_id to the fillable fields
        'subscription_type',
        'subscription_status',
        'subscription_applied_at',
        'subscription_start_date',
        'subscription_end_date',
    ];

    protected $casts = [
        'subscription_applied_at' => 'datetime',
    ];

    /**
     * The relationship between a company and its users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * The relationship between a company and its employees.
     */
    public function employees()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    /**
     * The relationship between a company and its subscription plan.
     */
    public function subscriptionPlan()
    {
        return $this->belongsTo(Plan::class, 'subscription_plan_id');
    }

    /**
     * Check if the company can add more employees based on the current subscription plan.
     */
    public function canAddEmployee()
    {
        return $this->employee_count < $this->subscriptionPlan->max_employees;
    }
}
