<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{



//

    public function sport(Post $post)
    {
        $tags = Tag::all();
        $query = Post::query();

        if (request('tag')) {
            $query->where('tag_id', request('tag'));
        }

        $posts = $query->orderBy('created_at', 'desc')->take(10)->paginate(10);

        return view('post.index', compact('posts', 'tags','post'));
    }


//


    public function show(Post $post)
    {
        $posts = Post::all();


        return view('post.show',[
            'post' => $post,
            'posts' => $posts,

        ]);
    }



    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Post::create($data);

        return redirect()->route('postsSport');


    }
}

