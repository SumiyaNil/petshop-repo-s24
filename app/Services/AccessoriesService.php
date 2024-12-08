<?php
namespace App\Services;

class AccessoriesService{
 public static function service($file,$path)
 {
    $fileName=null;
    if($file)
    {
         

         $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

         $file->storeAs($path,$fileName);
    }
 }
}