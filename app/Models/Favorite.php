<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // تحديد اسم الجدول إذا كان مختلفًا
    protected $table = 'favorites';

    // تحديد الأعمدة التي يمكن تعبئتها
    protected $fillable = ['user_id', 'course_id'];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع الكورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
