<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Accessories;
use Illuminate\Http\Request;

class AccessoriesController
{
    public function accessories()
    {
        $allaccessories = Accessories::all();
        return view('frontend.accessories',compact('allaccessories'));
    }
}
