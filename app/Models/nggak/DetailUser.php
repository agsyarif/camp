<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }

    // skills
    public function skill()
    {
        return $this->belongsToMany(skill::class);
    }
}
