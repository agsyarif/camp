<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'exam_id',
        'type_id',
        'title',
        'answer',
        'option1',
        'option2',
        'option3',
        'option4',
        'explainations',
    ];

    public function exam_id()
    {
        return $this->belongsTo(exam::class);
    }

    public function type()
    {
        return $this->belongsTo(type::class);
    }
}
