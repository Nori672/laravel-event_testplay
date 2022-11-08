<?php

namespace App\Http\Controllers;

use App\Facades\MyService as FacadesMyService;
use App\Interfaces\MyServiceInterface;
use App\Services\MyService;
use Illuminate\Http\Request;

class Hello2Controller extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
        $data = [
            'msg' => $request->hello,
            'data' => $request->alldata
        ];

        return view('hello.index2',$data);
    }
}
