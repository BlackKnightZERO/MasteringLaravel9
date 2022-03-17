<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'parent_id'];

    public function products() : Collection {
        return $this->hasMany(Product::class);
    }

}
