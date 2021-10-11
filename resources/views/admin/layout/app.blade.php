<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Quản lý @yield('title')</title>

    <meta name="csrf_token" content="{{ csrf_token() }}" />

    @include('admin.layout.styles')
    
    <script>
        var BASE_URL = '{{ url("/") }}';
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    @include('admin.layout.footer')
    @yield('scripts')
</body>
</html>