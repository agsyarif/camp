<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'course_category_id',
        'image',
        'price',
        'description',
        'level_id',
        'is_published',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(level::class);
    }

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function course_lessons()
    {
        return $this->hasMany(CourseLesson::class);
    }

    public function checkout_course()
    {
        return $this->hasMany(checkout_course::class);
    }

    public function exams()
    {
        return $this->hasMany(exam::class);
    }
}
