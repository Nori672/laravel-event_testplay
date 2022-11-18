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
        // $id = $request->query('page');
        $msg = 'show user record ';
        // $result = DB::table('users')->paginate(3,['*'],'paga',$id);
        // $result = DB::table('users')->simplePaginate(3);
        // $result = User::paginate(2);
        // $result = User::get()->filter(function($person)
        // {
        //     return $person->age < 50;
        // });

        // $result2 = User::get()->filter(function($person)
        // {
        //     return $person->age < 20;
        // });

        // $result3 = $result->diff($result2);
        // $paginator = new MyPaginator($result);

        // $keys = User::get()->modelkeys();
        // $even = array_filter($keys, function($key){
        //     return $key % 2 == 0;
        // });

        // $result = User::get()->except($even);

        // $even = User::get()->filter(function($item)
        // {
        //     return $item->id % 2 === 0;
        // });
        // $even2 = User::get()->filter(function($item)
        // {
        //     return $item->age % 2 === 0;
        // });
        // $result = $even->merge($even2);

        $even = User::get()->filter(function($item)
        {
            return $item->id % 2 === 0;
        });

        $map = $even->map(function($item,$key)
        {
            return $item->id . ':' .$item->name;
        });
        $data = [
            'msg' => $map,
            'data' => $even,
        ];

        return view('hello.index3',$data);
    }
}
