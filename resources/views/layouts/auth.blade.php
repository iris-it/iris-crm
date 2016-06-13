<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')
</head>

<body class="hold-transition login-page" id="app">

<div class="login-box">

    <div class="login-logo">
        <a href="#"><b>Iris</b>pass</a>
    </div>

    <div class="login-box-body">
        @yield('content')
    </div>

</div>

@include('elements.scripts')

</body>
</html>