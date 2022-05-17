<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Candidate;
use App\Post;
use App\Voter;
use App\Vote;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $takenPosts=Candidate::distinct()->select('post_id')->get();
        $arr=[];
        foreach ($takenPosts as $p) {
            array_push($arr, $p->post_id);
        }
        $posts=Post::whereIn('id', $arr)->get();
        $candidates=Candidate::all();


        $counts=[
          "candidates"=>Candidate::count(),
          "posts"=>Post::count(),
          "voters"=>Voter::count(),
          "votedCount"=>Vote::count(DB::raw('DISTINCT voter_id'))
        ];
        return view('admin.dashboard.index', compact('counts', 'candidates', 'posts'));
    }
    public function electionResult()
    {
        $takenPosts=Candidate::distinct()->select('post_id')->get();
        $arr=[];
        foreach ($takenPosts as $p) {
            array_push($arr, $p->post_id);
        }
        $posts=Post::whereIn('id', $arr)->get();
        $candidates=Candidate::all();
        return view(
            'admin.dashboard.election_result',
            compact('candidates', 'posts')
        );
    }
}
