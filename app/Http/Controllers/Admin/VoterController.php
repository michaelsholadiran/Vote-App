<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use  App\Voter;
use App\Imports\VotersImport;
use Excel;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $voters=Voter::latest()->get();
        return view('admin.voter.index', compact('voters'));
    }

    public function create()
    {
        return view('admin.voter.create');
    }
    public function edit($id)
    {
        $voter=Voter::findOrFail($id);
        return view('admin.voter.edit', compact('voter'));
    }
    public function delete($id)
    {
        Voter::findOrFail($id)->delete();
        return  back()->withInput()->with("message", "success");
    }
    public function deleteAll()
    {
        Voter::truncate();
        return  back()->withInput()->with("message", "success");
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
         "name"=>"required",
         "user_id"=>"required|numeric",
         "level"=>"required|numeric"
      ]);

        $voter = new Voter();
        $voter->name=$request->name;
        $voter->user_id=$request->user_id;
        $voter->level=$request->level;
        $voter->password=bcrypt('password');
        $voter->save();

        return  back()->withInput()->with("message", "success");
    }
    public function update(Request $request)
    {
        $this->validate(request(), [
          "name"=>"required",
          "user_id"=>"required|numeric",
          "level"=>"required|numeric"
      ]);
        Voter::findOrFail($request->id);
        Voter::where('id', $request->id)->update(request(["name","user_id","level","status"]));
        return  back()->withInput()->with("message", "success");
    }

    public function bulk()
    {
        return view('admin.voter.bulk');
    }
    public function uploadBulk(Request $request)
    {
        $this->validate(request(), [
       "file"=>"required"
        ]);
        Excel::import(new VotersImport, request()->file("file"));

        return  back()->withInput()->with("message", "success");
    }
}
