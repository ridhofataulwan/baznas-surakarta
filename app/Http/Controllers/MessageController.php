<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Mail\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function sendMessage()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'kategori' => 'required',
            'message' =>  'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Message::create([
            'name' => request('name'),
            'email' => request('email'),
            'kategori' => request('kategori'),
            'message' => request('message'),
        ]);
        Mail::to(request()->email)->send(new Notifikasi(request()->email, request('kategori') . ' anda sudah dikirimkan ke admin'));
        $users = User::role('admin')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new Notifikasi($user->email, 'Ada yang mengisi ' . request('kategori') . ' dengan nama ' . request('name')));
        }
        return redirect()->back()->with('status', request('kategori') . ' berhasil dikirimkan');
    }
}
