<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "model_name",
        "image",
        "description"
    ];

    public function marks()
    {
        return $this->belongsToMany(Mark::class, "car_model_mark", "model_id", "mark_id");
    }

}
