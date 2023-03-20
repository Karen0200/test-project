<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        "mark"
    ];


    public function models()
    {
        return $this->belongsToMany(CarModel::class, "car_model_mark", "mark_id", "model_id");
    }
}
