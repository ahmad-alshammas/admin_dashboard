<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'order',
        'total',
    ];

    public function course(){
        
        return $this->belongsTo(Course::class, 'course_id');
    }
    

    public function lessons(){
        return $this->hasMany(Lesson::class, 'section_id');
    }
}
