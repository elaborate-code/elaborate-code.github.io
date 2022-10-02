<!DOCTYPE html>
<html lang="{{ current_path_locale($page) }}">

@include('_layouts.head')

<body class="font-raleway scroll-smooth">

    @yield('header')

    @yield('body')

    @include('_layouts.footer')
</body>

</html>
