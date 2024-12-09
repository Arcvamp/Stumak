<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name', // Adjust this to the actual field name in the table
    ];

    /**
     * Relationship to the Product model.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
