<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The table associated with the model (optional if table name is 'products')
    protected $table = 'products';

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'price',
        'description',
        'negotiation',
        'contact',
        'email'
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attribute_id')
            ->withPivot('value');
    }
}
