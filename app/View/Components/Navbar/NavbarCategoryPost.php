<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
// use App\Models\CategoryPost;


class NavbarCategoryPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $arr = [];
        $category = CategoryPost::all();
        foreach ($category as $c) {
            $slug = Str::slug($c->name, '-');
            array_push($arr, $slug);
        }
        $lenght = count($arr) - 1;
        return view('components.navbar.category-post', compact('category', 'arr', 'lenght'));
    }
}
