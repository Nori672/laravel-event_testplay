<?php

namespace App\Http\Controllers;

use App\Http\Pagination\MyPaginator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class hello3Controller extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('page');
        $msg = 'show page: ' . $id;
        // $result = DB::table('users')->paginate(3,['*'],'paga',$id);
        // $result = DB::table('users')->simplePaginate(3);
        $result = User::paginate(2);
        $paginator = new MyPaginator($result);
        $data = [
            'msg' => $msg,
            'data' => $result,
            'link' => $paginator
        ];

        return view('hello.index3',$data);
    }
}
