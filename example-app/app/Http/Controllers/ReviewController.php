<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
class ReviewController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer','min:1','max:5'],
            'user_id' => ['required', 'exists:users,id']
            //exist=quel campo deve esistere nella tabella user
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        $review= new Review();
        $review->description=$request->input('description');
        $review->stars=$request->input('stars');
        $review->user_id = $request->input('user_id');
       $review->save();
       return response()->json($review,201);

    }
    public function delete(Request $request, $id) {
        
        $review=Review::where('id','=',$id)->firstOrFail();
        $review->delete();
        return response()->json(null,204);
    }
    public function read(Request $request, $id) {
        
        $review= Review::where('id','=',$id)->firstOrFail();
        return response()->json($review);

    }
    public function readAll(Request $request) {
    
        $reviews= Review::with('user')->get();
        //aggiungendo with user gli dico di caricare tutti i dati anche dell'altra tabella
        //praticamente una join in automatico
        return response()->json($reviews,200);

    }
    public function update(Request $request, $id) {
      
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'max:255'],
            'stars' => ['required', 'integer','min:1','max:5'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

      
        $review= Review::where('id','=',$id)->firstOrFail();
     

        $review->description=$request->input('description');
        $review->stars=$request->input('stars');
        $review->user_id = $request->input('user_id');
      
        $review->save();

        return response()->json($review,200);

    }
}
