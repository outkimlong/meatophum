<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.title-meta', ['title' => $title])
    @include('layouts.head-css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.topbar')
        <aside class="main-sidebar">
            @include('layouts.left-sidebar')
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.footer-script')
</body>

</html>
