<!DOCTYPE html>
<html lang="{{ $lang ?? 'en' }}">

@include('_layouts.head')

<body class="font-raleway scroll-smooth">

    @yield('header')

    @yield('body')

    @include('_layouts.footer')
</body>

</html>
