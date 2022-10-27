<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;


class AdminPostController extends Controller
{
    public function listPost($category)
    {
        $category_name = ucwords(str_replace('-', ' ', $category));
        $post = Post::Join('category_post', 'category_post.id', '=', 'post.category_id')->where('name', $category_name)->select('post.*', 'category_post.name')->get();
        return view('admin.post.index', compact('post', 'category_name'));
    }

    public function editPost($id)
    {
        $categories = CategoryPost::all();
        $category = Post::where('id', $id)->first();
        $post = Post::find($id);
        return view('admin.post.edit', compact('post', 'category', 'categories'));
    }

    public function createPost()
    {
        $category = CategoryPost::all();
        return view('admin.post.add', compact('category'));
    }

    public function storePost(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'content' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png|max:10240',
            ]
        );

        if ($validated) {
            $gambar = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/post'), $name_gen);
            $last_img = 'uploads/post/' . $name_gen;

            $category_name = CategoryPost::where('id', $request->category)->select('name')->first();
            $slug_category = strtolower(str_replace('-', ' ', $category_name->name));

            Post::insert(
                [
                    'title' => $request->title,
                    'author' => 'Admin',
                    'content' => $request->content,
                    'category_id' => $request->category,
                    'image' => $last_img,
                    'created_at' => Carbon::now()
                ]
            );
            return redirect('/admin/post/' . $slug_category)->with('success', 'Post berhasil ditambahkan');
        }
    }

    public function destroyPost($postID)
    {
        $post = Post::find($postID);
        if (file_exists($post->image)) {
            unlink($post->image);
            Post::find($postID)->delete();
            return redirect()->back()->with('success', 'Post berhasil dihapus');
        } else {
            Post::find($postID)->delete();
            return redirect()->back()->with('success', 'Post berhasil dihapus');
        }
    }

    public function updatedPost(Request $request, $postID)
    {
        $post = Post::find($postID);

        $old_image = $request->old_image;
        $post_image = $request->file('gambar');
        $category_name = CategoryPost::where('id', $request->category)->select('name')->first();
        $slug_category = strtolower(str_replace('-', ' ', $category_name->name));
        if ($post_image) {
            $name_gen = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            $post_image->move(public_path('uploads/post'), $name_gen);
            $last_img = 'uploads/post/' . $name_gen;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request->content,
                'image' => $last_img,
            ]);

            return redirect('/admin/post/' . $slug_category)->with('success', 'Post Updated Successfully');
        } else {
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'content' => $request->content,
            ]);
            return redirect('/admin/post/' . $slug_category)->with('success', 'Post Updated Successfully');
        }
    }

    public function statusPost($id)
    {
        $post = Post::find($id);
        $post->status == 'ACTIVE' ? $post->update(['status' => 'INACTIVE']) :
            $post->update(['status' => 'ACTIVE']);
        return redirect()->back()->with('success', 'Status Data Post berhasil diubah');
    }
}