<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function jobListing() {
        return $this->belongsToMany(JobListing::class);
    }


}
