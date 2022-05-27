<?php

namespace App\Http\Controllers;

use App\Services\Pushall;
use Session;

class PushServiceController extends Controller
{
    public function form()
    {
        return view('service');
    }

    public function send(Pushall $pushall)
    {
        $data = \request()->validate([
            'title' => ['required', 'max:80'],
            'text' => ['required', 'max:500'],
        ]);

        $pushall->send($data['title'], $data['text']);

        Session::flash('Сообщение успешно отправлено');

        return back();
    }
}
