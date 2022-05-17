<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Imports\PostsImport;
use App\Post;
use Excel;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts=Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.post.create');
    }
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }
    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return  back()->withInput()->with("message", "success");
    }
    public function deleteAll()
    {
        Post::truncate();
        return  back()->withInput()->with("message", "success");
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
         "name"=>"required",
         "status"=>"required|numeric"
            ]);
        Post::create(request(["name","status"]));
        return  back()->withInput()->with("message", "success");
    }
    public function update(Request $request)
    {
        $this->validate(request(), [
          "name"=>"required",
          "status"=>"required|numeric"
      ]);
        Post::findOrFail($request->id);
        Post::where('id', $request->id)->update(request(["name","status"]));
        return  back()->withInput()->with("message", "success");
    }

    public function bulk()
    {
        return view('admin.post.bulk');
    }
    public function uploadBulk(Request $request)
    {
        $this->validate(request(), [
     "file"=>"required"
      ]);

        Excel::import(new PostsImport, request()->file("file"));

        return  back()->withInput()->with("message", "success");
    }
}
