@extends('admin.layouts.app')
@section('post', 'active')
@section('title', ' پست ها')

@section('content')

    <section class="container container-table">
        <section class="card">
            <section class="card-header p-3 header-table d-flex justify-content-between aling-item-center">
                <div>
                    <h3>لیست پست ها</h3>
                </div>
                <div>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-info">ایجاد پست</a>
                </div>
            </section>
            <section class="card body p-5">
                <table class="table table-striped  table-hover  table-responsive">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">نام پست</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">دسته بندی</th>
                            <th scope="col">نویسنده</th>
                            <th scope="col">تاریخ ساخت</th>
                            <th scope="col" class="text-center">تنظیمات</th>

                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td><img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                    class="img-fluid"style="max-width: 80px;"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->summery }}</td>
                            <td>{{ $post->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                            <td>{{ $post->Category->name }}</td>
                            <td>{{ auth()->user()->email }}</td>
                            <td>{{ jalaliDate($post->created_at, 'H:i:s Y/m/d') }}</td>
                            <td class="text-start">
                                <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-outline-success btn-sm"><i
                                        class="bi bi-pencil-square fs-8"></i>ویرایش</a>
                                <form action="{{ route('admin.post.status', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i
                                            class="bi bi-toggles2"></i>تغییر وضعیت</button>
                                </form>
                                <form action="{{ route('admin.post.delete', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                            class="bi bi-trash fs-8"></i>حذف</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </section>
        </section>
    </section>

@endsection
