<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index'); // або інший Blade-файл

    }
    public function about()
    {
        return view('about');
    }
    public function shop()
    {
        return view('shop');
    }
    public function contacts()
    {
        return view('contacts');
    }
}
