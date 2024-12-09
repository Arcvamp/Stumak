<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes', 'attribute_id', 'product_id')
                    ->withPivot('value');
    }
}
