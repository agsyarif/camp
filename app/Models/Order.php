<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function orderCourse()
    {
        return $this->hasMany(OrderCourse::class);
    }

    public function orderWebinar()
    {
        return $this->hasMany(OrderWebinar::class);
    }
}
