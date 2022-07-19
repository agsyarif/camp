<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseMaterial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_lesson_id',
        'title',
        'video_url',
    ];

    public function courseLesson()
    {
        return $this->belongsTo(CourseLesson::class);
    }
}
