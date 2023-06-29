<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
       
        return view('books.index', [ 
            'books' => Book::orderBy('rating','desc')->get() 
        ]);
    }

    public function delete(Request $request, $id)
    {
        $book = Book::where('id', '=', $id)->firstOrFail();
        $book->delete();
        return view('books.feedback.deleted');
    }

    public function create()
    {
        return view('books.create');
    }

    public function edit(Request $request, $id)
    {
        $book = Book::where('id', '=', $id)->firstOrFail();
        return view('books.edit', [
            'book' => $book
        ]);

    }

    public function save(Request $request)
    {
        
        
        $request->validate([
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
            'abstract' => ['required', 'max:100000'],
            'pages' => ['required', 'integer', 'min:1' ,'max:5000'],
            'rating' => ['required','integer','min:1','max:10']
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author'); 
        $book->abstract = $request->input('abstract'); 
        $book->pages = $request->input('pages'); 
        $book->rating = $request->input('rating');
       
        
        $book->save();
        return view('books.feedback.created');
    }
    public function update(Request $request, $id)
    {
        $book = Book::where('id', '=', $id)->firstOrFail();
        $request->validate([
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
            'abstract' => ['required', 'max:100000'],
            'pages' => ['required', 'integer', 'min:1' ,'max:5000'],
            'rating' => ['required','integer','min:1','max:10']
        ]);
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author'); 
        $book->abstract = $request->input('abstract'); 
        $book->pages = $request->input('pages'); 
        $book->rating = $request->input('rating');
       
        $book->save();
        return view('books.feedback.modified');
    }
}
