<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessories extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
