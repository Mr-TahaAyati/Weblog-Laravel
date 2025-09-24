@extends('home.layouts.app')
@section('title', 'ادامه مطلب')

@section('content')
    <section class="container mb-4">
        <div class="row">
            @include('home.layouts.navbar')

            <div class="col-xl-9  order-xl-1 order-0 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h2>نمایش <span class="text-primary">جزئیات</span></h2>
                    </div>
                    <div class="card-body p-sm-4">
                        <div class="item mb-4">

                            <div class="row">
                                <div class="col-lg-12 mb-3 text-justify ">
                                    <a href="#" class="mb-3">
                                        <h1>موضوع : {{$post->title}}</h1>
                                    </a>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="img-fluid my-4 blogimg radius15" />
                                   <p>{{$post->body}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
