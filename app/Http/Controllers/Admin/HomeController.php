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
        $allpost = Post::get()->count();
        $count_requests = DB::table('request')->get()->count();
        $messages = Message::take(3)->latest('id', 'desc')->get();
        $count_messages = Message::count();

        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y');
        $margin = $now - 2023;
        if ($margin < 5) {
            $last = 2023;
        } else {
            $last = $now - 5;
        }
        $Month = date('Y-m-d');
        $thisMonth = (int)date("m");

        return view('admin.admin', compact('messages', 'posts', 'count_messages', 'count_requests', 'now', 'last', 'allpost', 'Month', 'thisMonth'));
    }
}