<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Voter;

// use App\Providers\RouteServiceProvider;

class VoterLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:voter", ['except'=>['logout']]);
    }

    public function index()
    {
        return view('auth.voter_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        "user_id"=>"required",
        "password"=>"required"
      ]);
        if (Auth::guard('voter')->attempt(["user_id"=>$request->user_id,
      "password"=>$request->password,'voted'=>0])) {
            return redirect()->intended("/vote");
        }
        return redirect()->back();
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    public function logout()
    {
        // $id=Auth::guard('voter')->id();
        Auth::guard('voter')->logout();
        // $user=    Voter::find($id);
        // $user->voted=1;
        // $user->save();
        return redirect('/');
    }
}
