<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driving_license_no',
        'issue_date',
        'expiry_date',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
