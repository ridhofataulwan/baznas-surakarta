<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class AdmCategoryController extends Controller
{
    public function listCategoryPost()
    {
        $category_post = CategoryPost::all();
        return view('admin.category.index', compact('category_post'));
    }

    public function storeCategoryPost(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        if ($validated) {
            CategoryPost::insert(['name' => $request->name]);
        }

        return redirect('/admin/category/')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function updateCategoryPost(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);
        if ($validated) {
            $category = CategoryPost::find($request->id);
            $category->timestamps = false;
            $category->update([
                'name' => $request->name
            ]);
        }

        return redirect('/admin/category/')->with('success', 'Kategori berhasil diubah');
    }

    public function destroyCategoryPost($id)
    {
        if ($id != 1) {
            $post = Post::where('category_id', $id)->get();
            if ($post == true) {
                for ($i = 0; $i < count($post); $i++) {
                    $post[$i]->update(['category_id' => 1]);
                }
            }
            CategoryPost::destroy($id);
            return redirect('/admin/category/')->with('success', 'Kategori berhasil dihapus');
        }
        return redirect('/admin/category/')->with('danger', 'Kategori ini tidak boleh dihapus');
    }
}
