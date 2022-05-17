<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Candidate;
use DB;
use App\Imports\CandidatesImport;
use Excel;
use File;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $candidates=Candidate::latest()->get();
        return view('admin.candidate.index', compact('candidates'));
    }

    public function create()
    {
        $posts=  DB::table('posts')->pluck('name', 'id');
        return view('admin.candidate.create', compact("posts"));
    }
    public function edit($id)
    {
        $posts=  DB::table('posts')->pluck('name', 'id');
        $candidate=Candidate::findOrFail($id);
        return view('admin.candidate.edit', compact('candidate', 'posts'));
    }
    public function delete($id)
    {
        Candidate::findOrFail($id)->delete();
        return  back()->withInput()->with("message", "success");
    }
    public function deleteAll()
    {
        Candidate::truncate();
        return  back()->withInput()->with("message", "success");
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
        "name"=>"required",
        "candidate_id"=>"required|numeric",
        "post_id"=>"required|numeric",
        "level"=>"required|numeric"
      ]);
        Candidate::create(request(["name","candidate_id","post_id","level"]));

        return  back()->withInput()->with("message", "success");
    }
    public function update(Request $request)
    {
        $this->validate(request(), [
        "name"=>"required",
        "candidate_id"=>"required|numeric",
        "post_id"=>"required|numeric",
        "level"=>"required|numeric",
        "status"=>"required|numeric"
      ]);
        Candidate::findOrFail($request->id);
        Candidate::where('id', $request->id)->update(request(["name","candidate_id","post_id","level","status"]));
        return  back()->withInput()->with("message", "success");
    }
    public function bulk()
    {
        return view('admin.candidate.bulk');
    }
    public function uploadBulk(Request $request)
    {
        $this->validate(request(), [
     "file"=>"required"
      ]);
        Excel::import(new CandidatesImport, request()->file("file"));

        return  back()->withInput()->with("message", "success");
    }


    public function uploadImage(Request $request)
    {
        Candidate::findOrFail($request->id);
        $this->validate(request(), [
        "file"=>"required|mimes:jpeg"
      ]);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/candidates');
            $image->move($destinationPath, $name);

            $prevImage=  Candidate::where('id', $request->id)->first()->image;
            File::delete($destinationPath.'/'.$prevImage);
            Candidate::where('id', $request->id)->update(["image"=>$name]);


            return back()->with('success', 'Image Upload successfully');
        }
    }
}
