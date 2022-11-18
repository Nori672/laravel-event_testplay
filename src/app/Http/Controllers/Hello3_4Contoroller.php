<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Hello3_4Contoroller extends Controller
{
    //3-4カスタムコレクションの利用
    public function index(Request $request)
    {
        $msg = 'show people record.';
        $re = User::get();
        $fields = User::get()->testfields();

        $data = [
            'msg' => implode(', ', $fields),
            'data' => $re,
        ];

        return view('hello.index3-4',$data);
    }

    public function save($id,$name)
    {
        $record = User::find($id);
        $record->name = $name;
        $record->save();
        return redirect('hello3_4');
    }

    public function json($id = -1)
    {
        if ($id == -1) {
            return User::get()->toJson();
        }
        else {
            return User::find($id)->toJson();
        }
    }
}
