<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foster extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function locationRel()
    {
        return $this->belongsTo(Location::class,'location');
    }
    public function breed()
    {
        return $this->hasMany(Breed::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
   
}
