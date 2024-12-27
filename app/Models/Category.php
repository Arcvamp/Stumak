<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name', // Adjusted to match the database field
    ];
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    // Relationship with ChildCategory
    public function childCategories()
    {
        return $this->hasManyThrough(ChildCategory::class, SubCategory::class);
    }

    // Relationship with Brand
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
