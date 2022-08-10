<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
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
    public function create()
    {
        if (auth()->guest()) {
            abort(403);
            abort(Response::HTTP_FORBIDDEN);
        }

        if (auth()->user()->username != 'Njanja') {
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('posts.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'title' => 'required',
        ]);
        $attributes['user_id'] = auth()->id();
        $post = Post::create($attributes);
        return redirect('/home');
    }
}
