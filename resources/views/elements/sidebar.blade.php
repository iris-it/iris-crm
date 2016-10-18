<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header text-center">{{ trans('app.sidebar:main-title') }}</li>
            <li><a href="{{ action('HomeController@index') }}"><i class="fa fa-dashboard"></i> <span>{{trans('app.general:dashboard')}}</span></a></li>
            <li><a href="{{ action('AccountController@index') }}"><i class="fa fa-briefcase"></i> <span>{{trans('app.general:accounts')}}</span></a></li>
            <li><a href="{{ action('LeadController@index') }}"><i class="fa fa-fire"></i> <span>{{trans('app.general:leads')}}</span></a></li>
            <li><a href="{{ action('ContactController@index') }}"><i class="fa fa-user"></i> <span>{{trans('app.general:contacts')}}</span></a></li>
            <li><a href="{{ action('QuoteController@index') }}"><i class="fa fa-file-text"></i> <span>{{trans('app.general:quotes')}}</span></a></li>
            <li><a href="{{ action('OrderController@index') }}"><i class="fa fa-line-chart"></i> <span>{{trans('app.general:orders')}}</span></a></li>
            <li><a href="{{ action('InvoiceController@index') }}"><i class="fa fa-archive"></i> <span>{{trans('app.general:invoices')}}</span></a></li>
            <li><a href="{{ action('ProductController@index') }}"><i class="fa fa-cubes"></i> <span>{{trans('app.general:products')}}</span></a></li>
            <li><a href="{{ action('ServiceController@index') }}"><i class="fa fa-truck"></i> <span>{{trans('app.general:services')}}</span></a></li>
            <li><a href="{{ action('TaxController@index') }}"><i class="fa fa-percent"></i> <span>{{trans('app.general:taxes')}}</span></a></li>

            @if(env('STANDALONE_MODE'))
                <li><a href="{{ action('Admin\OrganizationController@index') }}">{{trans('menu.admin-organizations-link')}}</a></li>
            @endif

            @can('permission::access_flow_admin_section')
                <li class="header">ADMIN</li>

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