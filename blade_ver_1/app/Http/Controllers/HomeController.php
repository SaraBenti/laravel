<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [//all'interno della vista ho le variabili di questo array 
            'time' => date('H:i:s'),//e quindi ad esempio $time...
            'date' => date('d/m/Y'),
            'rows' => [
                1,2,3,4,5,6,7,8,9,10
            ]
        ]);
    }
}
//escaping=codici che non vengono letti in html come il < e il >
//commenti in html visibili nel sorgente: nel blade i commenti non vengono visualizzati nel sorgente {{<!---->}}
//@ i comandi vogliono l'end (@if....@endif), tutto quello che in php è chiuso tra {} in blade devono avere @end..
//blade è un metalinguaggio e quindi deve essere trasformato in php►laravel che gestisce anche la cash che tiene in memoria ciò che è stato trasformato
// cash è dentro storage→framework→wiews: identificativo univoco=hash