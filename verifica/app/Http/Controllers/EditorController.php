<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Editor;

class EditorController extends Controller
{
    //- id
//- name VARCHAR(100)
//- vat_number VARCHAR(20)
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100'],
            'vat_number' => ['required', 'max:20']
        
            
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        $editor= new Editor();
        $editor->name=$request->input('name');
        $editor->vat_number=$request->input('vat_number');
       $editor->save();
       return response()->json($editor,201);

    }
    public function delete(Request $request, $id) {
        
        $editor=Editor::where('id','=',$id)->firstOrFail();
        $editor->delete();
        return response()->json(null,204);
    }
    public function read(Request $request, $id) {
        
        $editor= Editor::where('id','=',$id)->firstOrFail();
        return response()->json($editor);

    }
    public function readAll(Request $request) {

        
        $editors=Editor::with('books')->get();
        
        return response()->json($editors,200);

    }
    public function update(Request $request, $id) {
      
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100'],
            'vat_number' => ['required', 'max:20']
        
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

      
        $editor= Editor::where('id','=',$id)->firstOrFail();
     

        $editor->name=$request->input('name');
        $editor->vat_number=$request->input('vat_number');
       $editor->save();

        return response()->json($editor,200);

    }
}
