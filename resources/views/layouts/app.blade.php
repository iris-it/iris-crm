<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper" id="app">


    @include('elements.sidebar')

    @include('elements.header')

    <div class="content-wrapper">

        <section class="content-header">
            @yield('breadcrumbs')
        </section>

        @yield('content')

    </div>


    @include('elements.footer')

    @include('elements.control-sidebar')

</div>

@include('elements.scripts')

</body>
</html>
