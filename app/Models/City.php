<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';  // Optional, if your table name follows Laravel's pluralization rule, it's not necessary.

    protected $fillable = [
        'name',
        'state_id',
    ];

    // Define the relationship with the State model (inverse of foreign key)
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
