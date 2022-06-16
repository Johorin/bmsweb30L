<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth;

class AccessBlock
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
        //権限が管理者でないと見れないページ群
        $pages = [
            'update',
            'delete',
            'insert',
            'insertIniData',
            'orderStatus',
            'showSalesByMonth',
            'insertUser',
            'listUser',
        ];
        
        foreach($pages as $pageName) {
            //strpos関数は第一引数の健作対象文字列に対して第二引数の文字列が含まれているか判定
            if(strpos(url()->current(), $pageName) && (Auth::user()->authority === 1)) {
                $errMsg = '権限の無いページにはアクセスできません。';
//                 return redirect('error')->with('errMsg', $errMsg);
                return response(view('error', ['errMsg' => $errMsg]));
//                 return response(redirect('error')->with('errMsg', $errMsg));
            }
        }
        
        return $next($request);
    }
}
