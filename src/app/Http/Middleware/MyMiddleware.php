<?php

namespace App\Http\Middleware;

use App\Facades\MyService;
use Closure;
use Illuminate\Http\Request;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //ミドルウェアの前処理・開始
        $id = rand(0,count(MyService::alldata()));
        MyService::setId($id);
        $marge_data = [
            'msg'=>MyService::say(),
            'alldata'=>MyService::alldata()
        ];
        $request->merge($marge_data);
        //ミドルウェアの前処理・終了

        $response = $next($request);

        //ミドルウェアの後処理・開始
        $content = $response->content();
        $content .= '<style>
                    body {background-color:#eef; }
                    p {font-size:18pt; }
                    li {color:red; font-weight:bold; }
                    </style>';
        $response->setContent($content);
        //ミドルウェアの後処理・終了

        return $response;
    }
}
