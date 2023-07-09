<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{


//

    public function index(Post $post)
    {
        $tags = Tag::all();
        $query = Post::query()->orderBy('created_at','desc');

        if (request('tag')) {
            $query->where('tag_id', request('tag'));
        }

        $posts = $query->oldest()->paginate(5);

        return view('posts.index', [
                'posts'=>$posts,
                'tags'=>$tags,
                'post'=>$post
        ]);
    }


//


    public function show(Post $post)
    {
        $comments = Comment::all();

        return view('posts.show',[
            'post' => $post,
            'comments' => $comments,

        ]);
    }


    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Post::create($data);

        return redirect()->route('posts.index');


    }

    public function comment(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required',
            'text' => 'required|string|min:5'
        ]);
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);

        return redirect(route('posts.show', $data['post_id']));
    }
}

