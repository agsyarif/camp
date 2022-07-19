<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // forign from detail user
    // public function detail_user()
    // {
    //     return $this->belongsToMany(DetailUser::class);
    // }
}
