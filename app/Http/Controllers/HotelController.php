<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('hotels.index', [
            'hotels' => Hotel::get()
        ]);
    }

    public function delete(Request $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->firstOrFail();
        $hotel->delete();
        return view('hotels.deleted');
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function save()
    {

    }

}