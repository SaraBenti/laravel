<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'time' => date('H:i:s'),
            'date' => date('d/m/Y'),
            'rows' => [
                1,2,3,4,5,6,7,8,9,10
            ]
        ]);
    }
}
