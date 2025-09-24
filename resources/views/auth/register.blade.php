@extends('auth.layouts.app')
@section('title', 'ثبت نام')

@section('content')
    <section class="container maxw">
        <div class="card login  mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card-body p-4 text-center">
                         <a href="#"><img src="{{ asset('auth-assets/images/Logo.min.svg.png') }}" alt="logo"
                                style="height: 50px;"></a>
                        <form action="{{ route('auth.register_submit') }}" method="POST">
                            @csrf
                            <section class="p-2">
                                 @include('auth.layouts.partials.error')
                            </section>
                            <div class="form-group">
                                <input type="text" name="name" id="username" class="form-control" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input type="text" name="family" id="username" class="form-control"
                                    placeholder="نام و نام خانوادگی">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="mail" class="form-control"
                                    placeholder="آدرس ایمیل">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="کلمه عبور">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password_confirmation" id="password" class="form-control"
                                    placeholder="تکرار کلمه عبور">
                            </div>
                            <button type="submit" name="register" id="register"
                                class="btn btn-block btn-success py-2 radius10 mb-4">عضویت</button>
                            <p>ثبت نام کرده اید ؟ <a href="{{ route('auth.login') }}" class="text-drkprimary">ورود به
                                    سایت</a></p>

                        </form>
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <img src="{{ asset('auth-assets/images/login.jpg') }}" class="img-fluid d-lg-block d-none" />
                </div>
            </div>
        </div>
    </section>
@endsection
