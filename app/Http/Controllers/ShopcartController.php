<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopcartController extends Controller
{
    public function __invoke()
    {
        return view('shopcart');
    }
}
