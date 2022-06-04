<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * DISPLAY MENU PAGE
     * 
     */
    public function showMenu()
    {
        return view('menu');
    }
}
