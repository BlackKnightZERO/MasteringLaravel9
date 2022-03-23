<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class NewsfeedController extends Controller
{
    public function __invoke() {
        $posts = Post::withCount('comments')->get();
        dd($posts);
        return "HI";
    }
}
