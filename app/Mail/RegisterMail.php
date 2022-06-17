<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
//追加
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartInfoAndTotal)
    {
        $this->cartInfo = $cartInfoAndTotal['cartInfo'];
        $this->total = $cartInfoAndTotal['total'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->to('hoyuak2145@docomo.ne.jp')  // 送信先アドレス
        ->subject('ご注文の受付完了')              // 件名
        ->view('registers.register_mail')            // 本文
        ->with([
            'userName' => Auth::user()->name,
            'cartInfo' => $this->cartInfo,
            'total' => $this->total,
        ]);
    }
    
    // 送信ボタン押下時に呼ばれる
    public static function register($cartInfoAndTotal) {
        Mail::send(new RegisterMail($cartInfoAndTotal));
    }
}
