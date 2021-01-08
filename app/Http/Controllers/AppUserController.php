<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Image;
use Illuminate\Support\Facades\Session;
use Hashids;
use Intervention\Image\ImageManager;
use App\Models\AppUser;

class AppUserController extends Controller
{
    public function registeruser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'ucaddress' => 'required',
            'number_of_votes' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $path =   $originalPath = public_path() . '/images/';
        $img = $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $appimage = time() . $originalImage->getClientOriginalName();
        $userresult = AppUser::get();
        foreach ($userresult as $key => $value) {
            $cnic =  $value->cnic;
            if ($cnic == $request->get('cnic')) {
                $response['status'] = 'Cnic already exit!.';
                return json_encode($response);
            }
        }
        $response = array();
        $user = $request->all();
        $user['image'] = $appimage;
        $data = AppUser::create($user);
        $response['id'] = $data->id;
        $response['status'] = !empty($data) ? 200 : 204;
        return json_encode($response);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cnic' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $password = $request->password;
        $cnic = $request->cnic;
        $user = AppUser::where('cnic', $cnic)->where('password', $password)->first();
        if (!empty($user)) {
            $userpassword =  $user->password;
            $usercnic = $user->cnic;
            $id = $user->id;
            if ($password = $userpassword && $cnic == $usercnic) {
                $response = array();
                $response['id'] = $id;
                $response['status'] = 'Login successfully';
                return json_encode($response);
            }
        } else {
            $response = array();
            $response['status'] = 'Cnic && Password Invalid';
            return json_encode($response);
        }
    }

    public function index(Request $request)
    {
        $appusers = AppUser::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('admin.appuser.index', compact('appusers'));
    }

    public function update(Request $request)
    {
        $id = $request->user_id;
        $requestdata =  $request->all();
        $user = AppUser::findOrFail($id);
        if ($user) {
            $user->update($requestdata);
            $response = array();
            $response['status'] = 'User updated!';
            return json_encode($response);
        } else {
            $response = array();
            $response['status'] = 'User not updated!';
            return json_encode($response);
        }
    }

    public function destroy(Request $request,$id){
        $id = Hashids::decode($id);
        $status = '0' ;
        $user = AppUser::findOrFail(@$id[0]);
        if($user){
            $user->update(['status'=> $status ]);
            Session::flash('success', 'User deleted!');
            return back();
        }
      
        
    }
    
        public function passwordupdate(Request $request){
        $validator = Validator::make($request->all(), [
            'cnic' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $cnic = $request->cnic;
        $password = $request->all();
        $user = AppUser::where('cnic', $cnic)->first();
        if (!empty($user)) {
            if ($user->cnic == $cnic) {
                $user->update($password);
                $response = array();
                $response['status'] = 'Password updated!';
                return json_encode($response);            
             }
        }
       else {
           $response = array();
           $response['status'] = 'Please enter correct cnic!';
           return json_encode($response);
        }        

    }
    
    // user return data 
    public function show(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $response = array();
        $id = $request->get('user_id');
        $data = AppUser::findOrFail($id);
        $response['data'] = $data;
        $response['status'] =  !empty($data) ? 200 : 204;
        return json_encode($response);               
    }
    
    //chat messages to user 
    
    public function sendMessage(Request $request){
         $requestdata['messages'] =  $request->message;
         $requestdata['user_id'] =  $request->user_id;
          $requestdata['admin_id'] =  '0';
         $response = Message::create($requestdata);
         $response['status'] = "Successfully submitted";
         $response['status'] =  !empty($data) ? 200 : 204;
        return json_encode($response);     
    }
    
    
    public function fetchmessage(){
    $message = Message::get();
   // $message = Message::with('User')->get();
    $response['data'] = $message;
    $response['status'] =  !empty($data) ? 200 : 204;
    return json_encode($message); 
    }
    
    
        public function index_chat(Request $request){

        $id = $request->id;
       
        $others = \App\Models\User::where('id', '!=', $id)->pluck('name', 'id');
       
       
        return json_encode($others);  
    }
}
