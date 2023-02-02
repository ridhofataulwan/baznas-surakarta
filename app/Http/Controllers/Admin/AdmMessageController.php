<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class AdmMessageController extends Controller
{
    public function indexMessage()
    {
        $message = Message::all();

        $title = 'Daftar Pesan';
        return view('admin.message.index', compact('message', 'title'));
    }
}
