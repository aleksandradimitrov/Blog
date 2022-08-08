<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $currentCategory = (null !== request('category'))
        //     ? Category::where('slug', request('category'))->first()
        //     : null;
        // $currentCategory = request('category');

        $posts = Post::latest()->filter(
            request(['category'])
        )->filter(request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
