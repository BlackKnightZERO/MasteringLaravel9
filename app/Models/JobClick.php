<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobClick extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jobListing() {
        return $this->belongsTo(JobListing::class);
    }
}
