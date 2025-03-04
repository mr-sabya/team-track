<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'document_type_id',
        'identifier',
        'issue_date',
        'expiry_date',
        'amount',
        'period_start',
        'period_end',
        'period',
        'status',
        'attachment'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];

    public function getAttachmentUrlAttribute()
    {
        return $this->attachment ? Storage::url($this->attachment) : null;
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
