<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @yield('script')
</body>
</html>