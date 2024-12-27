<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_name', 'category_id', 'slug', 'description'];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with ChildCategory
    public function childCategories()
    {
        return $this->hasMany(ChildCategory::class);
    }

    // Relationship with Brand
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
