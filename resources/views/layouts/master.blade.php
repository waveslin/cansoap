<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.header')

    <main>
    @yield('content')
    </main>

    @include('partials.footer')

    @yield('script')
</body>
</html>