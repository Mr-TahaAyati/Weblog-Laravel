@extends('auth.layouts.app')
@section('title', 'ورود')
@section('content')
    <section class="container maxw">
        <div class="card login  mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card-body p-4 text-center">
                        <a href="#"><img src="{{ asset('auth-assets/images/Logo.min.svg.png') }}" alt="logo"
                                style="height: 50px;"></a>
                        <section class="p-2">
                            @include('auth.layouts.partials.error')
                        </section>
                        <form action="{{ route('auth.login_submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="ایمیل">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="کلمه عبور">
                            </div>
                            <button type="submit" name="login" id="login"
                                class="btn btn-block py-2 btn-success radius10 my-3">ورود</button>

                            <p>هنوز ثبت نام نکرده اید ؟ <a href="{{ route('auth.register') }}" class="text-drkprimary">عضویت
                                    در سایت</a></p>
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
