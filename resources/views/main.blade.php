<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('header')
</head>
<body class="bg-grey-lighter font-sans font-normal antialiased h-full">
    @yield('content')

    @include('footer')
</body>
</html>
