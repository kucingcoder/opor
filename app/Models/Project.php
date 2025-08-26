<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'visit_link',
        'client_name',
        'client_logo',
        'client_link',
        'category',
    ];

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class, 'id_project');
    }
}
