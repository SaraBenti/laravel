<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function create(Request $request) {
      
        $validator = Validator::make($request->all(), [

            'title' => ['required', 'max:100'],
            'num_pages' => ['required', 'integer'],
            'abstract' => ['required', 'max:255'],
            'editor_id' => ['required', 'exists:editors,id'],
            'author_id' => ['required', 'exists:authors,id']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $book= new Book();
        $book->title=$request->input('title');
        $book->num_pages=$request->input('num_pages');
        $book->abstract=$request->input('abstract');
        $book->editor_id=$request->input('editor_id');
        $book->author_id=$request->input('author_id');
        $book->save();

        return response()->json($book,201);

    }

    public function delete(Request $request, $id) {
        $book=Book::where('id','=',$id)->firstOrFail();
        $book->delete();
        return response()->json(null,204);
    }

    public function read(Request $request, $id) { 
        $book= Book::where('id','=',$id)->firstOrFail();
        return response()->json($book);
    }

    public function readAll(Request $request) {
        
        $books= Book::with('editor','author')->get();
        
        return response()->json($books,200);

    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:100'],
            'num_pages' => ['required', 'integer'],
            'abstract' => ['required', 'max:255'],
            'editor_id' => ['required', 'exists:editors,id'],
            'author_id' => ['required', 'exists:authors,id']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

     
        $book= Book::where('id','=',$id)->firstOrFail();
        

        $book= new Book();
        $book->title=$request->input('title');
        $book->num_pages=$request->input('num_pages');
        $book->abstract=$request->input('abstract');
        $book->editor_id=$request->input('editor_id');
        $book->author_id=$request->input('author_id');
        $book->save();


        return response()->json($book,200);

    }
}
