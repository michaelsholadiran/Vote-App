<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vote;
use App\Candidate;
use App\Post;
use App\Voter;
use DB;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:voter');
    }


    public function index()
    {
        $candidates=Candidate::distinct()->select('post_id')->where('status', 1)->get();
        return view('website.vote', compact('candidates'));
    }
    public function store()
    {
        $id=Auth::guard('voter')->id();
        $user=    Voter::find($id);
        $user->voted=1;
        $user->save();

        $candidatesCount=Candidate::where('status', 1)->count(DB::raw('DISTINCT post_id'));
        $votes=request()->all();
        if (sizeof(array_unique($votes))-2 != $candidatesCount) {
            return  redirect('/')->with("message", "error");
        }
        $u=Auth::id();
        foreach ($votes as $p =>$c) {
            if ($p == "_token" || $p == "submit") {
                continue;
            }
            if (!Candidate::where('id', $c)->count()) {
                Vote::where('candidate_id', $u)->delete();
                return  redirect('/')->with("message", "error");
            }
            $candidate=Candidate::where('id', $c)->first();

            Vote::create([
            "candidate_id"=>$c,
            "post_id"=>$candidate->post_id,
            "voter_id"=>$u,
          ]);
        }


        // return  route('voter.logout');->with("message", "success")
        return  redirect(route('voter.logout'));
    }
}
