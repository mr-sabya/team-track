<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'image', 'year'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
