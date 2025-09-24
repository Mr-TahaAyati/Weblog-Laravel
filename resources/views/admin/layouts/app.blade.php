<!doctype html>
<html lang="fa_IR">

<head>
    @include('admin.layouts.head-tag')
</head>

<body dir="rtl">
    <section id="app">
        @include('admin.layouts.header')
        <section class="container container-table mt-2 mb-2 ">
            @include('admin.alerts.success')
                        @include('admin.alerts.error')

        </section>
        @yield('content')
        @include('admin.layouts.footer')
        @include('admin.layouts.script')
    </section>
</body>

</html>
