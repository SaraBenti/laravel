<?php

namespace App\Http\Controllers;
use App\Models\Review;

use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function index()
    {
       
        return view('reviews.index', [ 
            'reviews' => Review::orderBy('rating','desc')->get() 
        ]);
    }

    public function delete(Request $request, $id)
    {
        $review = Review::where('id', '=', $id)->firstOrFail();
        $review->delete();
        return view('reviews.feedback.deleted');
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function edit(Request $request, $id)
    {
        $review = Review::where('id', '=', $id)->firstOrFail();
        return view('reviews.edit', [
            'review' => $review
        ]);

    }

    public function save(Request $request)
    {
        
        
        $request->validate([
            'hotel_name' => ['required', 'max:255'],
            'content' => ['required', 'max:100000'],
            'rating' => ['required','min:1','max:5']
        ]);

        $review = new Review();
        $review->name = $request->input('hotel_name');
        $review->stars = $request->input('content'); 
        $review->address = $request->input('rating');
       
        
        $review->save();
        return view('reviews.feedback.created');
    }
    public function update(Request $request, $id)
    {
        $review = Review::where('id', '=', $id)->firstOrFail();
        $request->validate([
            'hotel_name' => ['required', 'max:255'],
            'content' => ['required', 'max:100000'],
            'rating' => ['required','min:1','max:5']
        ]);
        $review = new Review();
        $review->name = $request->input('hotel_name');
        $review->stars = $request->input('content'); 
        $review->address = $request->input('rating');
       
        $review->save();
        return view('reviews.feedback.modified');
    }
}
