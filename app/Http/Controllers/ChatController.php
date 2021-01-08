<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\User;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\SendMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\MessageSend;
use Illuminate\Support\Facades\Broadcast;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function login(Request $request)
    // {

    //     $password = $request->password;
    //     $email = $request->email;
    //     $user = User::where('email', $email)->where('password', $password)->first();
    //     if (!empty($user)) {
    //         $email = $user->email;
    //         $id = $user->id;
    //         if (Hash::check($password, $user->password) && $email == $email) {
    //             $response = array();
    //             $response['id'] = $id;
    //             $response['status'] = 'Login successfully';
    //             return json_encode($response);
    //         }
    //     } else {
    //         $response = array();
    //         $response['status'] = 'Cnic && Password Invalid';
    //         return json_encode($response);
    //     }
    // }


    public function index(){
        return view('chat');
    }

    public function fetchmessage(){

      $message =   Message::with('user')->get();
      
        return  $message;
    }


    public function sendMessage(Request $request){
       
         dd($request->all(), "hello outer");
       
        // if (!empty($request->user_id)) {
            dd($request->all(), "i am inner");

            $requestdata['messages'] =  $request->message;
            $requestdata['user_id'] =  $request->user_id;
         
            $message = Message::create($requestdata);
       
            broadcast(new MessageSend($message->load('user')))->toOthers(); 
            $response['message'] =  "Message send!";
            return json_encode($response);  


    //     }else {
            
    //   $requestdata['messages'] =  $request->message;
    //   $requestdata['user_id'] =  Auth::id();
    
    //   $message = Message::create($requestdata);
  
    //     broadcast(new MessageSend($message->load('user')))->toOthers(); 

    //     return ['status'=>'success'];

    //      }
       

    }

    public function sendappMessage(Request $request){
        dd($request->all());
    }
    
}
