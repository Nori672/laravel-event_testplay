<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request){
        $data = [
            'msg' => $request->hello,
        ];
        return view('hello.index',$data);
    }

    public function other(Request $request){
        $data = [
            'msg' => $request->bye
        ];
        return view('hello.index',$data);
    }

    public function indexModel($user){
        $data = [
            'msg' => $user,
        ];
        return view('hello.index',$data);
    }
}
