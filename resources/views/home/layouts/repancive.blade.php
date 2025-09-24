   <!-- ریسپانسیو سایت -->
        <div class="of-site-mask"></div>
        <div class="off-canvas-wrap ">
            <div class="close-off-canvas-wrap">
                <a href="#" id="of-close-off-canvas">
                    <i class="fal fa-times"></i>
                </a>
            </div>
            <div class="off-canvas-inner">
                <div id="of-mobile-nav" class="mobile-menu-wrap">
                    <ul class="mobile-menu">
                        <li class="current-menu-item">
                            <a href="Index_demo1.html">صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="blog.html">مقالات</a>
                        </li>
                        <li><a href="aboutus.html" target="_blank">درباره ما</a></li>
                        <li><a href="ContactUs.html" target="_blank">تماس با ما</a></li>
                             @if (!auth()->check())
                                   <li><a href="{{ route('auth.register') }}" target="_blank">ثبت نام</a></li>
                                   <li><a href="{{ route('auth.login') }}" target="_blank">ورود</a></li>
                               @endif
                               @if (auth()->check())
                                   <li><a href="{{ route('auth.profile') }}" target="_blank">پروفایل</a></li>
                               @endif
                    </ul>
                </div>
            </div>
        </div>
        