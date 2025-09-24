  <header class="header d-flex justify-content-between align-items-center px-3">
        <div class="d-flex gap-2">
            <button class="btn btn-outline-light btn-back" onclick="window.location.href='{{route('blog')}}'">صفحه اصلی</button>
                  @if (auth()->check() && auth()->user()->role==1 || auth()->user()->role==2)
                  <button class="btn btn-outline-light btn-back" onclick="window.location.href='{{route('admin.home')}}'">پنل ادمین</button>
                   @endif
        </div>
        <button class="btn btn-outline-danger btn-logout" onclick="window.location.href='{{route('auth.logout')}}'">خروج از حساب</button>
    </header>