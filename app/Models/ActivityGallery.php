<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'id_activity',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id_activity');
    }
}
