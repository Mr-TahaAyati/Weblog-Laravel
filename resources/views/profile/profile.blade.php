@extends('profile.layouts.app')
@section('profile','active')
@section('content')
    <main class="profile-container">
        <div class="profile-card">
            <h1>پروفایل کاربر</h1>
            <div class="profile-info">
                <div class="info-row">
                    <span class="label">نام:</span>
                    <span class="value" id="name">{{$user->name}}</span>
                </div>
                <div class="info-row">
                    <span class="label">نام خانوادگی:</span>
                    <span class="value" id="family">{{$user->family}}</span>
                </div>
                <div class="info-row">
                    <span class="label">ایمیل:</span>
                    <span class="value" id="email">{{$user->email}}</span>
                </div>
                  <div class="info-row">
                    <span class="label">نقش :</span>
                    <span class="value" id="family">{{ $user->role == 2 ? 'مدیر' : ($user->role == 1 ? 'ادمین' : 'کاربر عادی')}}</span>
                </div>
                <div class="info-row">
                    <span class="label">تاریخ ایجاد حساب:</span>
                    <span class="value" id="created_at">{{jalaliDate( $user->created_at,' Y/m/d H:i:s ' )}}</span>
                </div>
            </div>
   @if (auth()->check() && auth()->user()->role==1  || auth()->user()->role==2)
                <div class="articles-container">
                <h2>مقالات ثبت شده</h2>
                <ul class="articles-list">
                    @foreach (auth()->user()->Post as $post)
                        <li>{{$post->title}}=>{{$post->summery}}</li>
                    @endforeach
                </ul>
            </div>
   @else
          <div class="articles-container">
                <h2>مقالات ثبت شده</h2>
                <ul class="articles-list">
                  <li>شما دسترسی به مقالات را ندارید</li>
                </ul>
            </div>
    
        </div>
   @endif

    </main>
@endsection

