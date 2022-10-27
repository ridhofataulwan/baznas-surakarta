<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class AdmMessageController extends Controller
{
    public function indexMessage()
    {
        $message = Message::all();
        return view('admin.message.index', compact('message'));
    }
}
