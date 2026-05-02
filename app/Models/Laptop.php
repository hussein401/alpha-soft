<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $fillable = ['category_id', 'brand', 'model', 'ram', 'storage', 'details', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
