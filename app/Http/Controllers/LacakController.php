<?php

namespace App\Http\Controllers;

use App\Models\Cmf;
use Illuminate\Http\Request;

class LacakController extends Controller
{
    public function index(Request $request)
    {
        $no_cmf = $request['no_cmf'];
        $cmf = Cmf::where('no_cmf', $no_cmf)->first();
        return view('themes.back.lacak',compact(
            'cmf'
        ));
    }
}
