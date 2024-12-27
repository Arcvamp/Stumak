<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name', 'slug', 'description', 'category_id', 'sub_category_id', 'child_category_id', 'is_active'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with SubCategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // Relationship with ChildCategory
    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class);
    }
}
