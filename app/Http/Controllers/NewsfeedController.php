<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class NewsfeedController extends Controller
{
    public function __invoke() {
        $posts = Post::withCount('comments')->latest()->paginate(config('app.paginate'));
        $categories = Category::all();
        return view('backend.newsfeed.index', compact('posts', 'categories'));
    }
}
