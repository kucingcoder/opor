<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
    ];

    public function galleries()
    {
        return $this->hasMany(ActivityGallery::class, 'id_activity');
    }
}
