<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    // The table associated with the model (optional if table name is 'states')
    protected $table = 'state';

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'country_id', // Assuming each state belongs to a country
    ];

    /**
     * Define a relationship to the Country model.
     * Each state belongs to a single country.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
