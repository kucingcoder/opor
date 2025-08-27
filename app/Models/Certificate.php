<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'file',
        'certificate_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(CertificateCategory::class, 'certificate_category_id');
    }
}
