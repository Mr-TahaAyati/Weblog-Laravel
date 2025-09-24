<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.post.create', compact('posts'), compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }
        Post::create($data);
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->except('_token');
        $post->update($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Post $post)
    {
        $post->status = $post->status == 1 ? 0 : 1;
        $post->save();
        return redirect()->route('admin.post.index')->with('alert-success', 'تغییر وضعیت با موفقیت انجام شد');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.index')->with('alert-success', ' حذف پست با موفقیت انجام شد');
    }
}
