@extends('admin.layouts.app')
@section('title', 'ایجاد پست')
@section('post', 'active')



@section('content')



    <section class="container container-table">
        <section class="card">
            <section class="card-header p-3 header-table d-flex justify-content-between aling-item-center">
                <div>
                    <h3>ایجاد پست جدید</h3>
                </div>
                <div>

                    <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-info">بازگشت</a>
                </div>
            </section>
            <section class="card body p-5">
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-md-6">
                            <section class="form-group">
                                <label for="title" class="form-label">نام پست</label>
                                <input class="form-control form-control-sm @error('title') is-invalid @enderror"
                                    type="text" placeholder="نام پست" aria-label=".form-control-sm example"
                                    id="title" name="title">
                            </section>
                            @error('title')
                                <span class="text-danger error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </section>

                        <section class="col-md-6">
                            <section class="form-group">
                                <label for="user_id" class="form-label">نویسنده</label>
                                <select class="form-select form-select-sm @error('user_id') is-valid @enderror"
                                    id="user_id" name="user_id">
                                    <option value="{{ auth()->id() }}" selected>{{ auth()->user()->email }}</option>
                                </select>
                            </section>
                        </section>

                        <section class="col-md-12 mt-2">
                            <section class="form-group">
                                <label for="status" class="form-label">وضعیت</label>
                                <select class="form-select form-select-sm  @error('status') is-invalid @enderror"
                                    id="status" name="status">
                                    <option selected>وضعیت مورد نظر را انتخاب کنید</option>
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </section>
                            <section class="col-md-12 mt-2">
                                <section class="form-group">
                                    <label for="cat_id" class="form-label">دسته بندی</label>
                                    <select class="form-select form-select-sm @error('cat_id') is-invalid @enderror"
                                        id="cat_id" name="cat_id">
                                        <option selected disabled>دسته بندی مورد نظر را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <span class="text-danger error">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </section>
                            </section>



                            <section class="col-md-6 mt-2">
                                <section class="form-group">
                                    <label for="summery" class="form-label">توضیح کوتاه</label>

                                    <textarea name="summery" id="summery" rows="5"
                                        class="form-control form-control-sm  @error('summery') is-invalid @enderror"></textarea>
                                </section>
                                @error('summery')
                                    <span class="text-danger error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-12 mt-2">
                                <section class="form-group">
                                    <label for="body" class="form-label">توضیحات</label>

                                    <textarea name="body" id="body" rows="5"
                                        class="form-control form-control-sm  @error('body') is-invalid @enderror"></textarea>
                                </section>
                                @error('body')
                                    <span class="text-danger error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-12 mt-2">
                                <section class="form-group">
                                    <label for="image" class="form-label">تصویر</label>

                                    <input type="file" name="image"
                                        class="form-control form-control-sm  @error('image') is-invalid @enderror">

                                </section>
                                @error('image')
                                    <span class="text-danger error">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-12 mt-2">
                                <section class="form-group">
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </section>
                            </section>
                        </section>
                </form>
            </section>
        </section>
    </section>



@endsection
