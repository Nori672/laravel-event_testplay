<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function __construct()
    {
        // $this->fname = 'sample.txt';
        $this->fname = 'hello.txt';
    }
    public function index(Request $request){
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data
        ];
        return view('hello.index',$data);
    }

    public function other(Request $request){
        // return view('hello.index',$data);
        return redirect()->route('sample');
    }

    public function indexModel($user){
        $data = [
            'msg' => $user,
        ];
        return view('hello.index',$data);
    }

    public function indexStorage(){
        // $sample_msg = $this->fname;
        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified = Storage::disk('public')->lastModified($this->fname);
        $modified_time = date('Y-m-d H:i:s',$modified);
        $sample_meta = [$url,$size,$modified_time];
        $result = implode(" ",$sample_meta);
        // $sample_data = Storage::get($this->fname);
        $sample_data = Storage::disk('public')->get($this->fname);
        $data = [
            'msg' => $result,
            'data' => explode(PHP_EOL,$sample_data)
        ];
        return view('hello.index',$data);
    }
    
    public function otherStorage($msg){
        // $data = Storage::get($this->fname) . PHP_EOL . $msg;
        // Storage::put($this->fname,$data);
        if (Storage::disk('public')->exists('bk_'.$this->fname)) {
            Storage::disk('public')->delete('bk_'.$this->fname);
        }
        Storage::disk('public')->copy($this->fname,'bk_'.$this->fname);
        if (Storage::disk('local')->exists('bk_'.$this->fname)) {
            Storage::disk('local')->delete('bk_'.$this->fname);
        }
        Storage::disk('local')->move('public/bk_'.$this->fname,'bk_'.$this->fname);
        return redirect()->route('hello');
    }

    public function downloadStorage(){
        return Storage::disk('public')->download($this->fname);
    }

    public function uploadStorage(Request $request){
        Storage::disk('local')->putFile('files',$request->file('file')); //storage/app内の「files」フォルダにアップロードされる
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files',$request->file('file'),'upload'.$ext);
        return redirect()->route('hello');
    }
}
