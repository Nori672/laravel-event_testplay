<?php

namespace App\Http\Controllers;

use App\Interfaces\MyServiceInterface;
use App\Services\MyService;
use Illuminate\Http\Request;

class Hello2Controller extends Controller
{
    public function __construct()
    {

    }
    public function index(MyServiceInterface $myService, int $id = -1){
        $myService->setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        return view('hello.index2',$data);
    }
}
