<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    /*
        |--------------------------------------------------------------------------
        | ROUTE METHODS
        |--------------------------------------------------------------------------
    */
    public function home() {
        return view('page.home');
    }
    
    public function page() {
        return view('page.home');
    }
    
    public function cv() {
        return view('page.home');
    }

}
