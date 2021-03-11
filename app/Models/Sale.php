<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function current_state()
    {
        return $this->hasMany(CurrentState::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
