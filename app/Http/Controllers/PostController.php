<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function sport(Post $post)
    {
        $tags = Tag::all();


        $posts = Tag::find(1)->posts()->paginate(5);

        return view('post.sport', [
            'tags' => $tags,
            'posts' => $posts,
            'post' => $post,


        ]);
    }

    public function animal(Post $posts)
    {
        $tags = Tag::all();


        $posts = Tag::find(2)->posts()->paginate(5);

        return view('post.animal', [
            'posts' => $posts,
            'tags' => $tags
        ]);
    }
    public function cosmos(Post $posts)
    {
        $tags = Tag::all();;
//
        $posts = Tag::find(3)->posts()->paginate(5);

        return view('post.cosmos', [
            'posts' => $posts,
            'tags' => $tags,


        ]);
    }

    public function usa(Post $posts)
    {
        $tags = Tag::all();;
//
        $posts = Tag::find(4)->posts()->paginate(5);

        return view('post.usa', [
            'posts' => $posts,
            'tags' => $tags,


        ]);
    }

    public function it(Post $posts)
    {
        $tags = Tag::all();//
        $posts = Tag::find(5)->posts()->paginate(5);

        return view('post.it', [
            'posts' => $posts,
            'tags' => $tags,


        ]);
    }


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
        Post::create($data);

        return redirect()->route('postsSport');


    }
}

