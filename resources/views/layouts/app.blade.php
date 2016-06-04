<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')
</head>
<body>


@include('elements.sidebar')

@include('elements.header')


@yield('content')


@include('elements.footer')

@include('elements.scripts')

</body>
</html>
