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
    public function index(MyServiceInterface $myService, int $id = -1){
        FacadesMyService::setId($id);
        $data = [
            'msg' => FacadesMyService::say(),
            'data' => FacadesMyService::alldata()
        ];

        return view('hello.index2',$data);
    }
}
