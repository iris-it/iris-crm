<!-- all app js-->

<script src="{{ elixir("js/core.js") }}"></script>
<script src="{{ elixir("js/app.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        @yield('js-app-scope')
    });
</script>

@yield('scripts')