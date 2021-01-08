<?php

namespace App\Http\Controllers;
use Hashids;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Image;
use Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

        return view('admin.project.index');
    
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
        $path =   $originalPath = public_path() . '/projectimage/';
        $img = $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $appimage = time() . $originalImage->getClientOriginalName();
        $response = array();
        $project = $request->all();
        $project['image'] = $appimage;
       $data = Project::create($project);        
        Session::flash('success', 'Project added!');
        return back();
    }

    
    public function show(){
        $response = array();
        $data = Project::orderBy('created_at', 'DESC')->get();;
        $response['status'] = !empty($data) ? 200 : 204;
        $response['data'] = $data;
        return json_encode($response);   
    }

    public function get(){
        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('admin.project.create',compact('projects'));
    }

    public function destroy(Request $request, $id){
        $id = Hashids::decode($id);
        $data = Project::findOrFail(@$id[0])->delete();
        Session::flash('success', 'Project deleted!');
        return redirect('projects/show');
    }
}
