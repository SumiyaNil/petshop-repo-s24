<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController
{
    public function report()
    {
        return view('backend.report');
    }
}
