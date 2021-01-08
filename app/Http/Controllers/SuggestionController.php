<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Session;
use Hashids;
class SuggestionController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'subject' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
            $response = array();
            $user_id = $request->get('user_id');
            $suggeation = $request->all();
            $data = Suggestion::create($suggeation);
             if (!empty($data)) {
              $suggeation =  Suggestion::where('user_id', $user_id)->get(); 
            }
            $response['suggestions'] = $suggeation; 
            $response['status'] = !empty($data) ? 200 : 204;
           return json_encode($response);   
        }
         
                 
    public function show(){
        $suggestions =  Suggestion::with('appuser')->orderBy('created_at','desc')->get();
        return view('admin.suggestion.index',compact('suggestions'));
     }

     
    public function destroy(Request $request, $id){
        $id = Hashids::decode($id);
        $user = Suggestion::findOrFail(@$id[0])->delete();
        Session::flash('success', 'Suggestion deleted!');
        return back();
    }
    
    
    public function put(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user_id = $request->get('user_id');
        $suggestions = Suggestion::where('user_id', $user_id)->orderBy('created_at','desc')->get();
        $response['suggestions'] = $suggestions;
        $response['status'] = !empty($data) ? 200 : 204;
        return json_encode($response);   
    }

}
