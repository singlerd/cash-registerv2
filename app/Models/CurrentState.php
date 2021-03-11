<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentState extends Model
{
    use HasFactory;


    public function drink()
    {
        return $this->hasOne(Drink::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
