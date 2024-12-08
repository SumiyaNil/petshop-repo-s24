<?php
namespace App\Repositories;
use App\Models\Breed;


class BreedStoreRepository{
 
    public static function store($request){
        Breed::create([
            'name'=>$request->breed_name,
            'cost'=>$request->cost,
          ]);
    }
}