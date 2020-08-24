<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    @yield('script')
</body>
</html>