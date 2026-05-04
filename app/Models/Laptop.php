<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $fillable = ['category_id', 'laptop_model_id', 'model', 'ram', 'storage', 'price', 'details', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class);
    }
}
