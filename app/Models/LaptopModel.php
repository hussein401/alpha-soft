<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaptopModel extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}
