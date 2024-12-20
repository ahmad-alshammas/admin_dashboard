<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'section_id',
        'title',
        'content_url',
        'order',
    ];


    public function section(){
        return $this->belongsTo(Section::class , 'section_id')->orderBy('order');
    }
}
