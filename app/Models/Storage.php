<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = ['storageable_id', 'storageable_type', 'file_type', 'path'];

    public function storageable() {
        return $this->morphTo();
    } 
}

