<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\Pushall;
use function request;

class PushServiceController extends Controller
{
    public function form()
    {
        return view('service');
    }

    public function send(Pushall $pushall)
    {
        $data = request()->validate([
            'title' => 'required|max:80',
            'text' => 'required|max:500'
        ]);

        $pushall->send($data['title'], $data['text']);

        return redirect('/service')->with('info', 'Сообщение отправленно');
    }
}
