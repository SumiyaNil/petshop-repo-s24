<?php

namespace App\Providers;

use App\Models\Accessories;
use App\Models\Category;
use App\Models\Foster;
use App\Models\Location;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
     Paginator::useBootstrap();
     $allcategories = [];
     if(Schema::hasTable('categories','customers','fosters','accessories'))
     {
        $allcategories=Category::all();
        view()->share('categories',$allcategories);
        $location=Location::all();
        view()->share('location',$location);
        
        $foster=Foster::all();
        view()->share('foster',$foster);
        $fostercount=Foster::find('$id');
        view()->share('fostercount',$fostercount);
      
     }
     
    
    }
}
