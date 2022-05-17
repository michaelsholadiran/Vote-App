<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\loginactivie;

use DB;

class VoterController extends Controller
{
    public function checkVoterActivity()
    {
        $a=loginactivie::all();
        $arr=[];
        $time_range= strtotime('- 10 seconds');
        foreach ($a as $q) {
            if ($time_range < strtotime($q->updated_at)) {
                array_push($arr, $q->voter['name']);
            }
        }
        return response()->json(array('msg'=> $arr), 200);
    }
    public function voterActivity(Request $request)
    {
        $user = loginactivie::updateOrCreate(['user_id' => request()->user_id], [
    'updated_at' =>Now()
]);
        // $msg = $request->user_id;
        // return response()->json(array('msg'=> $msg), 200);
    }
}
