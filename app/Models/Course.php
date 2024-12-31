<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'instructor_id',
        'category_id',
    ];


    public function instructor(){
        return $this -> belongsTo(User::class , 'instructor_id', 'id');
    }

    public function category(){
        return $this->belongsTo(CourseCategory::class, 'category_id' , 'category_id');
    }

    public function sections(){
        return $this->hasMany(Section::class, 'course_id');
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

    public function students(){
        return $this->belongsToMany(User::class , 'enrollments');
    }

// في نموذج Course
public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites');
}

public function isFavoritedBy(User $user)
{
    return $this->favorites()->where('user_id', $user->id)->exists();
}

public function favorites()
{
    return $this->belongsToMany(User::class, 'favorites');
}

public function usersFavorited()
{
    return $this->belongsToMany(User::class, 'course_user');
}

public function usersWhoFavorited()
{
    return $this->belongsToMany(User::class, 'favorites');
}



}
