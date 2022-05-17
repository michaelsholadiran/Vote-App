<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Candidate;

class LandPageController extends Controller
{
    public function index()
    {
        $candidates=Candidate::distinct()->select('post_id')->where('status', 1)->get();
        return view('website.index', compact('candidates'));
    }
}
