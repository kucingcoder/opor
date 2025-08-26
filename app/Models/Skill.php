<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'description',
        'id_skill_category',
    ];

    public function category()
    {
        return $this->belongsTo(SkillCategory::class, 'id_skill_category');
    }
}
