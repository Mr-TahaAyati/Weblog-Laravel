@extends('admin.layouts.app')
@section('title', 'ویرایش دسته‌بندی')
@section('category', 'active')

@section('content')
    <section class="container container-table">
        <section class="card">
            <section class="card-header p-3 header-table d-flex justify-content-between align-items-center">
                <div>
                    <h3>ویرایش دسته‌بندی</h3>
                </div>
                <div>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-info">بازگشت</a>
                </div>
            </section>
            <section class="card-body p-5">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <section class="row">
                        <section class="col-md-6">
                            <section class="form-group">
                                <label for="name" class="form-label">نام دسته‌بندی</label>
                                <input class="form-control form-control-sm @error('name') is-invalid @enderror"
                                       type="text" placeholder="نام دسته‌بندی" aria-label=".form-control-sm example"
                                       id="name" name="name" value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </section>
                        </section>

                        <section class="col-md-6">
                            <section class="form-group">
                                <label for="user_id" class="form-label">نویسنده</label>
                                <select class="form-select form-select-sm @error('user_id') is-invalid @enderror"
                                        id="user_id" name="user_id">
                                    <option value="{{ auth()->id() }}" {{ old('user_id', $category->user_id) == auth()->id() ? 'selected' : '' }}>
                                        {{ auth()->user()->family }}
                                    </option>
                                </select>
                                @error('user_id')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </section>
                        </section>

                        <section class="col-md-12 mt-2">
                            <section class="form-group">
                                <label for="status" class="form-label">وضعیت</label>
                                <select class="form-select form-select-sm @error('status') is-invalid @enderror"
                                        id="status" name="status">
                                    <option value="" disabled>وضعیت مورد نظر را انتخاب کنید</option>
                                    <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>فعال</option>
                                    <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>غیر فعال</option>
                                </select>
                                @error('status')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </section>
                        </section>

                        <section class="col-md-12 mt-2">
                            <section class="form-group">
                                <label for="description" class="form-label">توضیحات</label>
                                <textarea name="description" id="description" rows="5"
                                          class="form-control form-control-sm @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </section>
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