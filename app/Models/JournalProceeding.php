<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalProceeding extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'title',
        'description',
        'category',
        'visit_link',
    ];
}
