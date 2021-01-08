<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Session;
use Hashids;
use Intervention\Image\ImageManager;
use App\Models\Media;

class Mediacontroller extends Controller
{
    public function index(){

        return view('admin.media.index');
    
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);
        $originalImage = $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $path =   $originalPath = public_path() . '/media/';
        $img = $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $appimage = time() . $originalImage->getClientOriginalName();
        $response = array();
        $media = $request->all();
        $media['image'] = $appimage;
       $data = Media::create($media);        
        Session::flash('success', 'Media added!');

        return back();
    }


    public function show(){
        $response = array();
        $data = Media::orderBy('created_at', 'DESC')->get();;
        $response['status'] = !empty($data) ? 200 : 204;
        $response['data'] = $data;
        return json_encode($response);   
    }

    public function get(){
        $response = array();
        $medias = Media::orderBy('created_at', 'DESC')->get();
        return view('admin.media.create',compact('medias'));
    }

    public function destroy(Request $request, $id){
        $id = Hashids::decode($id);
        $data = Media::findOrFail(@$id[0])->delete();
        Session::flash('success', 'Media deleted!');
        return redirect('medias/show');
    }
}
