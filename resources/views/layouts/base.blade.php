<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')

    <!-- Normal rules -->
    <style media="all">
        html,
        body {
            width: 1200px !important;
        }

        .print-table-row {
            page-break-inside:avoid
        }

        .hidden{display:none;visibility:hidden}
        .visible-phone{display:none!important}
        .visible-tablet{display:none!important}
        .hidden-desktop{display:none!important}
        .visible-desktop{display:inherit!important}
    </style>

</head>

<body>

@yield('content')

@include('elements.scripts')
</body>
</html>
