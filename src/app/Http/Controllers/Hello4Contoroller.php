<?php

namespace App\Http\Controllers;

use App\Jobs\Myjob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Hello4Contoroller extends Controller
{
    public function index(User $user=null)
    {
        if ($user != null) {
            // Myjob::dispatch($user); //ここでジョブをキューに追加され、順次ジョブが実行される
            // Myjob::dispatch($user)->delay(now()->addMinutes(5)); //ジョブをキューに追加後、5分後にジョブが実行
            
            $qname = $user->id % 2 == 0 ? 'even' : 'odd'; //Userインスタンスのidを確認し、偶数なら「even」奇数なら「odd」
            Myjob::dispatch($user)->onQueue($qname); //キューに名前をつける
        }
        $msg = 'show people record.';
        $result = User::get();

        $data = [
            'input'=>'',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index4',$data);
    }

    public function index2()
    {
        $msg = 'show people record.';
        $result = User::get();

        $data = [
            'input'=>'',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index4',$data);
    }

    public function send(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        dispatch(function() use ($user)
        {
            Storage::append('user_access_log.txt',$user->name);
        });
        return redirect()->route('hello4');
    }
}
