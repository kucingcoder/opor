<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'id_project',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
