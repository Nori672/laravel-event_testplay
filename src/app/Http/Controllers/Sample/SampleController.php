<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request){
        $data = [
            'msg' => 'サンプルコントローラーindex'
        ];
        return view('hello.index',$data);
    }

    public function other(Request $request){
        $data = [
            'msg' => 'サンプルコントローラーothre'
        ];
        return view('hello.index',$data);
    }
}
