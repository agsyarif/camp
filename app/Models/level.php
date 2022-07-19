<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;

    // guarded
    protected $guarded = ['id'];

    public function courses()
    {
        return $this->hasMany(course::class);
    }

}
