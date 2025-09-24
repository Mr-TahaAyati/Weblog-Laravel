@extends('home.layouts.app')
@section('content')
    <section class="container mb-4">
        <div class="row">
            @include('home.layouts.navbar')

            <div class="col-xl-9  order-xl-1 order-0 mb-4">

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="card h-100 d-flex flex-column">
                                <a href="blog_destails.html">
                                    <img class="card-img-top img-fluid" src="{{ asset('storage/' . $post->image) }}"
                                        alt="Post Image" style="height: 200px; object-fit: cover;">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h2 class="IRANSans_Bold">
                                        <a href="blog_destails.html">{{ $post->title }}</a>
                                    </h2>
                                    <span class="text-primary fa12 IRANSans_Medium">
                                        <a href="#">{{ $post->Category->name }}</a>
                                    </span>
                                    <p class="flex-grow-1">
                                        {{ Str::limit($post->summery, 100) }}
                                    </p>
                                    <a href="{{ route('read', ['id' => $post->id]) }}"
                                        class="btn btn-sm btn-outline-primary mt-auto">ادامه مطلب</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-wrapper mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
