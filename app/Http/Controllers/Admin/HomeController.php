<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::take(5)->latest('id')->get();
        $count_requests = DB::table('request')->get()->count();
        $messages = Message::take(3)->latest('id', 'desc')->get();
        $count_messages = Message::count();
        return view('admin.admin', compact('messages', 'posts', 'count_messages', 'count_requests'));
    }
}