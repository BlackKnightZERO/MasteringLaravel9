<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Storage;
// use Illuminate\Database\Eloquent\Collection;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','title','slug', 'sku', 'price', 'sub_title', 'description', 'created_at', 'updated_at'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function storages() {
        return $this->morphMany(Storage::class, 'storageable');
    }
}
