<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiratesInfo extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'emirates_id_no',
        'card_no',
        'expiry_date',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
