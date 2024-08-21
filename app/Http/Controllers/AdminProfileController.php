<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController
{
    public function admin_profile()
    {
        return view('backend.adminProfile');
    }
}
