<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRmb extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
