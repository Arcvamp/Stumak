<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // The table associated with the model (optional if table name is 'countrys')
    protected $table = 'country';

    // Fillable fields to allow mass assignment
    protected $fillable = [
       'name',
       'slug'
    ];

    
}
