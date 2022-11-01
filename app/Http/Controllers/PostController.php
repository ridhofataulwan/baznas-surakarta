<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\CategoryPost;


class PostController extends Controller
{
    public function Post($category)
    {
        $category_name = ucwords(str_replace('-', ' ', $category));
        $post = Post::join('category_post', 'category_post.id', '=', 'post.category_id')->where('name', $category_name)->latest()->select(
            'post.*',
            'category_post.id as category_post_id',
            'category_post.name'
        )->paginate(6);
        $category = CategoryPost::all();
        return view('post.post', compact('post', 'category', 'category_name'));
    }

    public function detailPost($post_id)
    {
        $post = Post::find($post_id);
        return view('post.post-detail', compact('post'));
    }
}
