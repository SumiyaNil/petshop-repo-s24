<?php
namespace App\Repositories;

use App\Models\Accessories;

class AccessoriesStoreRepository{
    public static function store($request,$fileName)
    {
        Accessories::create([
            'name' => $request->acc_title,
            'description' =>$request->acc_description,
            'stock' =>$request->acc_stock,
            'price' =>$request->acc_price,
            'image' =>$fileName,
            'category_id'=>$request->category_id,
            'discount'=>$request->discount,
            
        ]);
    }
}