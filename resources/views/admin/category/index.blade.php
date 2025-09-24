@extends('admin.layouts.app')
@section('category', 'active')
@section('title', 'دسته بندی ها')

@section('content')

    <section class="container container-table">
        <section class="card">
            <section class="card-header p-3 header-table d-flex justify-content-between aling-item-center">
                <div>
                    <h3>لیست دسته بندی ها</h3>
                </div>
                <div>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-info">ایجاد دسته بندی</a>
                </div>
            </section>
            <section class="card body p-5">
                <table class="table table-striped  table-hover  table-responsive">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">نام دسته</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تاریخ ساخت</th>
                            <th scope="col" class="text-center">تنظیمات</th>

                        </tr>
                    </thead>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->status == 1 ? 'فعال' : 'غیر فعال' }}</td>
                            <td>{{ jalaliDate($category->created_at, 'H:i:s Y/m/d') }}</td>
                            <td class="text-start">

                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-outline-success btn-sm"><i
                                        class="bi bi-pencil-square fs-8"></i>ویرایش</a>


                                <form action="{{ route('admin.category.status', $category->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i
                                            class="bi bi-toggles2"></i>تغییر وضعیت</button>
                                </form>

                                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST"
                                    class="d-inline">
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
                {{ $categories->links() }}
            </section>
        </section>
    </section>

@endsection
