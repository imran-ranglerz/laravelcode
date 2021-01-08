<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Image;
use Illuminate\Support\Facades\Session;
use Hashids;
use Intervention\Image\ImageManager;
use App\Models\Complain;

class ComplainController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'subject' => 'required',
            'detail' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
            
        if (!empty($request->file('image'))) {
            $originalImage = $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $path =   $originalPath = public_path().'/complainimage/';
            $img = $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $appimage = time().$originalImage->getClientOriginalName();
            $response = array();
            $complain = $request->all();
            $complain['image'] = $appimage;
            $data = Complain::create($complain);
            $response['status'] = !empty($data) ? 200 : 204;
            return json_encode($response);   
        }else {
            $response = array();
            $complain = $request->all();
            $data = Complain::create($complain);
           $response['status'] = !empty($data) ? 200 : 204;
           return json_encode($response);   
        }
         

    }
    
        public function show(){
       $complains =  Complain::with('appuser')->orderBy('created_at','desc')->get();
       return view('admin.complain.index',compact('complains'));
    }

    public function destroy(Request $request, $id){
        $id = Hashids::decode($id);
        $user = Complain::findOrFail(@$id[0])->delete();
        Session::flash('success', 'Complain deleted!');
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
        $complains = Complain::where('user_id', $user_id)->orderBy('created_at','desc')->get();
        $response['complains'] = $complains;
        $response['status'] = !empty($data) ? 200 : 204;
        return json_encode($response);   
    }
}
