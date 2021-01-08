<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Validator;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

       $requestdata =   $request->all();
       $response  =  Message::create($requestdata);
       $response = array();
       $response['message'] = 'Successfully';
       $response['status'] = !empty($data) ? 200 : 204;
       return json_encode($response);
    }
}
