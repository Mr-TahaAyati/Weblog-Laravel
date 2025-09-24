@extends('admin.layouts.app')
@section('user', 'active')
@section('title','کاربران')

@section('content')

    <section class="container container-table">
        <section class="card">
            <section class="card-header p-3 header-table d-flex justify-content-between aling-item-center">
                <div>
                    <h3>لیست کاربران</h3>
                </div>
                <div>
                    <a href="{{ route('admin.home') }}" class="btn btn-sm btn-info">بازگشت</a>
                </div>
            </section>
            <section class="card body">
                <table class="table table-striped  table-hover  table-responsive">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام خانوادگی</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">نقش</th>
                            <th scope="col">تاریخ ورود</th>
                            <th scope="col" class="text-center">تنظیمات</th>

                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->family }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 2 ? 'مدیر' : ($user->role == 1 ? 'ادمین' : 'کاربر عادی') }}</td>
                            <td>{{ jalaliDate($user->created_at, 'Y/m/d') }}</td>
                            <td class="text-start">
                                <form action="{{ route('admin.user.status', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i
                                            class="bi bi-toggles2"></i>تغییر نقش</button>
                                </form>

                                <form action="{{route('admin.user.delete',$user->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash fs-8"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </section>

@endsection
