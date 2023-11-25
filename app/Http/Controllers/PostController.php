<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $total_post = Post::count();
        $posts = Post::latest()->paginate(3);

        if(request()->search){
        $view_data =[
            'posts' => $posts,
            'search' => request()->search,
        ];
            return $this->search(request());
        } else {
        $view_data =[
            'posts' => $posts,
            'total_post' => $total_post,
        ];
        return view('posts.index', $view_data);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.show', $view_data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::find($id);
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $posts = Post::find($id);
            $posts->title = $request->input('title');
            $posts->content = $request->input('content');
        $posts->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect('/');
    }

    public function search(Request $request){
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%$search%")->paginate(3);
        $view_data = [
            'posts' => $posts
        ];

        return view('posts.index', $view_data);
    }

}
