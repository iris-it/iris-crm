<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header text-center">{{ trans('menu.title') }}</li>

            <li>
                <a href="{{ action('HomeController@index') }}">
                    <i class="fa fa-home"></i>
                    <span>{{ trans('menu.home') }}</span>
                </a>
            </li>

            @can('permission::access_flow_admin_section')
                <li class="header">{{ trans('menu.admin-role') }}</li>

                <li class="treeview"><a href="#">
                        <span>{{ trans('menu.admin-section') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ action('HomeController@index') }}"><i class="fa fa-home"></i>
                                <span>{{ trans('menu.home') }}</span></a>
                        </li>
                    </ul>
                </li>
            @endcan


        </ul>
    </section>
</aside>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {
            var path = "{{Request::url()}}";
            $(".sidebar-menu a").each(function () {
                var href = $(this).attr('href');
                if (path.substring(0, href.length) === href) {
                    $(this).closest('li').addClass('active');
                    $(this).closest('li').parent().closest('li').addClass('menu-open active');
                    $(this).closest('li').parent().closest('li').parent().closest('li').addClass('menu-open active');
                }
            });
        });
    </script>
@endsection