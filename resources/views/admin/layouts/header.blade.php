<header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <a href="#" class="navbar-brand">پروژه لاراول</a>

            <button type="button" class="navbar-toggler mx-2" data-bs-toggler="collapse" data-bs-target="navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>


            <section class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a href="{{route('admin.home')}}" class="nav-link @yield('home')">خانه</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.category.index')}}" class="nav-link @yield('category')">دسته بندی</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.post.index')}}" class="nav-link @yield('post')">پست</a>
                    </li>
                      @if (auth()->check() && auth()->user()->role==2)  
                    <li class="nav-item ">
                        <a href="{{route('admin.user.index')}}" class="nav-link @yield('user')">کاربران</a>
                    </li>
                      @endif
                     <li class="nav-item ">
                        <a href="{{route('blog')}}" class="nav-link">صفحه اصلی سایت</a>
                    </li>            
                     </li>
                   @if (auth()->check() && auth()->user()->role==1)
                        <li class="nav-item ">
                        <a href="{{route('auth.profile')}}" class="nav-link @yield('profile')">پروفایل</a>
                    </li>
                   @endif
                </ul>
            </section>

        </nav>
    </header>