<!-- all app js-->

<script src="{{ elixir("js/app.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // show active tab on reload
        if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');

        // remember the hash in the URL without jumping
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            if (history.pushState) {
                history.pushState(null, null, '#' + $(e.target).attr('href').substr(1));
            } else {
                location.hash = '#' + $(e.target).attr('href').substr(1);
            }
        });

    });
</script>

@yield('scripts')