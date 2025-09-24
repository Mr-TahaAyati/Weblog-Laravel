<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function blog()
  {
    $posts = Post::orderBy('created_at', 'desc')->paginate(15); // default page param

    $nav_posts = Post::orderBy('created_at', 'desc')->paginate(4, ['*'], 'nav_page');
    $nav_categories = Category::orderBy('created_at', 'desc')->paginate(4, ['*'], 'nav_cat');

    return view('home.index', compact('posts', 'nav_categories', 'nav_posts'));
  }

  public function read($id)
  {

    $post = Post::findOrFail($id);
    $nav_posts = Post::orderBy('created_at', 'desc')->paginate(4, ['*'], 'nav_page');
    $nav_categories = Category::orderBy('created_at', 'desc')->paginate(4, ['*'], 'nav_cat');
    return view('home.readmore', compact('post', 'nav_categories', 'nav_posts'));
  }
}
