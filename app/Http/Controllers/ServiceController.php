<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getServicePage()
    {
        return view('website.services');
    }
}
