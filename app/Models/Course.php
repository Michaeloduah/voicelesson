<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function assignment() {
        return $this->hasMany(Assignment::class);
    }
    
    public function lesson() {
        return $this->hasMany(Lesson::class);
    }
}
