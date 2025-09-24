    <!-- نوبار سایت -->
    <div class="col-xl-3 order-xl-0 order-1 mb-4">
        <div class="card pcountry cati p-3 mb-3">
            <div class="d-flex flex-row justify-content-between bg-light py-2 px-4 my-2 bright radius15">
                <h2>دسته بندی ها</h2>
                <a href="#">- بیشتر -</a>
            </div>
            <ul class="list-unstyled">
                @foreach ($nav_categories as $nav_category)
                    <li><a href="#"><img src="{{ asset('blog-assets/Img/cati/img_2.jpg') }}"
                                class="ml-2" /><span>{{ $nav_category->name }}</span></a></li>
                @endforeach
            </ul>
        </div>
        <div class="card thumb-post p-3 mb-3">
            <h2 class="bg-light py-2 px-4 mt-2 mb-4 bright radius15">آخرین مطالب</h2>
            <ul class="fa12">
                @foreach ($nav_posts as $nav_post)
                    <li>
                        <div class="d-flex flex-row">
                            <a href="#">
                                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $nav_post->image) }}"
                                    alt="Post Image"
                                    style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;">
                            </a>

                            <div class="m-2">
                                <p><a href="#">{{ $nav_post->title }}</a></p>
                                <span>{{ jalaliDate($nav_post->created_at, 'Y/m/d') }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
