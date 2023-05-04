<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App;

class HotelController extends Controller
{
    public function index()
    {
        App::setLocale('it');
        return view('hotels.index', [ //nome senza estensione blade.php
            'hotels' => Hotel::orderBy('stars','desc')->get() //array associativo che passa i dati che voglio dare alla vista
        ]);
    }

    public function delete(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        $hotel->delete();
        return view('hotels.feedback.deleted');
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function edit(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        return view('hotels.edit', [
            'hotel' => $hotel
        ]);

    }

    public function save(Request $request)
    {
        //validazione con la request direttamente, qui non vedo quando c'è l'errore: laravel si salva gli errori e invia l'utente alla pagina 
        //precedente→lo sviluppatore deve mettere in evidenza gli errori
        $request->validate([
            'name' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'address' => ['required', 'max:255']//non va inserita la validazione del chekbox
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->input('name'); //stessa cosa di fare $_REQUEST['name']
        $hotel->stars = $request->input('stars'); //cioè è il name nell'html
        $hotel->address = $request->input('address');
        $hotel->all_year = $request->has('all_year');//il default viene letto da mysql; il ternaio è necessario per laravel
        //se lascio il value="" non devo usare input ma has senza ternario
        //$hotel->all_year = $request->input('all_year')? true : false; 
//dd($hotel);
        $hotel->save();
        return view('hotels.feedback.created');
    }
    public function update(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'max:255'],
            'stars' => ['required', 'integer', 'min:1', 'max:5'],
            'address' => ['required', 'max:255']
        ]);
        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->address = $request->input('address');
        $hotel->all_year = $request->has('all_year');
        $hotel->save();
        return view('hotels.feedback.modified');
    }

}