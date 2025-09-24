<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.category.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data = $request->except('_token');  // این خط رو اضافه کن

        Category::create($data);
        return redirect()->route('admin.category.index');
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
    $category = Category::findOrFail($id);
    return view('admin.category.edit', compact('category'));
}


    /**
     * Update the specified resource in storage.
     */
public function update(CategoryRequest $request, $id)
{
    $category = Category::findOrFail($id);
    $data = $request->except('_token');
    $category->update($data);

    return redirect()->route('admin.category.index')->with('success', 'دسته بندی با موفقیت ویرایش شد.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Category $category)
    {
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        return redirect()->route('admin.category.index')->with('alert-success', 'تغییر وضعیت با موفقیت انجام شد');
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        // بررسی اینکه آیا این دسته‌بندی پستی دارد یا نه
        if ($category->Post()->count() > 0) {
            return redirect()->back()->with('alert-error', 'این دسته‌بندی دارای پست است و قابل حذف نیست.');
        }

        // حذف دسته‌بندی
        $category->delete();

        return redirect()->route('admin.category.index')->with('alert-success', 'حذف دسته‌بندی با موفقیت انجام شد.');
    }
}
