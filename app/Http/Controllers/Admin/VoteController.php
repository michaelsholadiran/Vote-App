<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Vote;
use App\Voter;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $votes=Vote::distinct()->select('voter_id')->get();
        return view('admin.vote.index', compact('votes'));
    }
    public function store(Request $request)
    {
    }
    public function deleteAll()
    {
        // $user=    Voter::where('voted', 1)->get();
        // $user->voted=0;
        // $user->save();
        Voter::where('voted', 1)->update(['voted'=>0]);
        Vote::truncate();
        return  back()->withInput()->with("message", "success");
    }
    public function delete($id)
    {
        $user=    Voter::findOrFail($id);
        $user->voted=0;
        $user->save();
        Vote::where('voter_id', $id)->firstOrFail();
        $user=    Voter::find($id);
        $user->voted=0;
        $user->save();

        Vote::where('voter_id', $id)->delete();
        return  back()->withInput()->with("message", "success");
    }
}
