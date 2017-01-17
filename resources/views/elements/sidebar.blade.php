<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header text-center">{{ trans('app.sidebar:main-title') }}</li>
            <li><a href="{{ action('HomeController@index') }}"><i class="fa fa-area-chart text-aqua"></i>
                    <span>{{trans('app.general:dashboard')}}</span></a></li>
            <li><a href="{{ action('AccountController@index') }}"><i class="fa fa-address-book text-aqua"></i>
                    <span>{{trans('app.general:accounts')}}</span></a></li>
            <li><a href="{{ action('LeadController@index') }}"><i class="fa fa-address-book-o text-aqua"></i>
                    <span>{{trans('app.general:leads')}}</span></a></li>
            <li><a href="{{ action('ContactController@index') }}"><i class="fa fa-address-card text-aqua"></i>
                    <span>{{trans('app.general:contacts')}}</span></a></li>
            <li><a href="{{ action('QuoteController@index') }}"><i class="fa fa-file-text text-aqua"></i>
                    <span>{{trans('app.general:quotes')}}</span></a></li>
            <li><a href="{{ action('ReceiptController@index') }}"><i class="fa fa-file-text-o text-aqua"></i>
                    <span>{{trans('app.general:receipts')}}</span></a></li>
            <li><a href="{{ action('InvoiceController@index') }}"><i class="fa fa-file-archive-o text-aqua"></i>
                    <span>{{trans('app.general:invoices')}}</span></a></li>
            <li><a href="{{ action('ProductController@index') }}"><i class="fa fa-cubes text-aqua"></i>
                    <span>{{trans('app.general:products')}}</span></a></li>
            <li><a href="{{ action('ServiceController@index') }}"><i class="fa fa-handshake-o text-aqua"></i>
                    <span>{{trans('app.general:services')}}</span></a></li>
            <li><a href="{{ action('TaxController@index') }}"><i class="fa fa-percent text-aqua"></i>
                    <span>{{trans('app.general:taxes')}}</span></a></li>
            <li><a href="{{ action('OrganizationController@edit') }}"><i class="fa fa-cog text-aqua"></i>
                    <span>{{trans('app.general:config')}}</span></a></li>

            @if(env('STANDALONE_MODE'))
                {{--<li><a href="{{ action('Admin\OrganizationController@index') }}">{{trans('menu.admin-organizations-link')}}</a></li>--}}
            @endif

            @can('permission::access_flow_admin_section')
                <li class="header">ADMIN</li>

            @endcan

            <li class="header text-center">{{ trans('app.sidebar:tools') }}</li>
            <li><a href="{{ action('NoteController@index') }}"><i class="fa fa-pencil-square-o text-aqua"></i> <span>Mes notes</span></a></li>

        </ul>
    </section>
</aside>
