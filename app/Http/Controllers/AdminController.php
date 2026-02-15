<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Конструктор для middleware auth
    public function __construct()
    {
        // Перевіряємо, що користувач залогінений
        $this->middleware('auth');

        // Додатково перевірка is_admin
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->is_admin) {
                abort(403, 'Тільки для адмінів');
            }
            return $next($request);
        });
    }

    // Головна сторінка адміна
    public function index()
    {
        return view('admin.dashboard'); // створимо view трохи пізніше
    }
}
