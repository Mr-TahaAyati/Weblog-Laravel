       <header class="main_header wide_header">
           <div class="header_container">
               <div class="menu_wrapper menu_sticky">
                   <div class="container p_relative h86">
                       <div id="navigation" class="of-drop-down of-main-menu" role="navigation">
                           <ul class="menu">
                               <li></li>
                               <li>
                                   <a href="{{route('blog')}}">صفحه اصلی</a>
                               </li>
                               <li><a href="{{route('blog')}}">مقالات</a></li>
                               <li><a href="{{route('blog')}}">درباره ما</a></li>
                               <li><a href="{{route('blog')}}">تماس با ما</a></li>
                               @if (!auth()->check())
                                   <li><a href="{{ route('auth.register') }}" target="_blank">ثبت نام</a></li>
                                   <li><a href="{{ route('auth.login') }}" target="_blank">ورود</a></li>
                               @endif
                               @if (auth()->check())
                                   <li><a href="{{ route('auth.profile') }}">پروفایل</a></li>
                               @endif

                           </ul>
                       </div>
                       <div class="m_search pt-xl-3 pt-1"><i class="fal fa-search"></i></div>
                       <div class="is-show mobile-nav-button">
                           <a id="of-trigger" class="icon-wrap  mt-2" href="#"> <i
                                   class="fal fa-bars"></i>فهرست</a>
                       </div>
                       <form class="search_wrap mt-lg-0" id="ajax-form-search" method="get" action="">

                           <input type="text" id="search-form-text" class="search-field" value=""
                               name="s" placeholder="کلید واژه مورد نظر ...">
                           <button><i class="fal fa-search"></i></button>

                           <input type="hidden" name="post_type" value="product">
                           <div id="ajax-search-result"></div>
                       </form>
                   </div>
               </div>
           </div>
       </header>

       <div class="clearfix"></div>
       <section class="container mt-4 mb-2">
           <div class="row">
               <div class="col-12">
                   <div class="breadcrumb radius15 shadow-sm">
                       <ul>
                           <li><a href="#">خانه / </a></li>
                           <li><a href="#" class="current">لیست مقالات</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </section>
