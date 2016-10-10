<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')
</head>

<body class="hold-transition login-page">

<div class="col-md-6 col-md-offset-3" style="margin-top:15%" id="app">

    <div class="login-logo">
        <p style="font-size:2em"><b>Iris</b>-PASS</p>
    </div>

    <div class="col-md-12">
        @yield('content')
    </div>

</div>

@include('elements.scripts')

</body>
</html>
