<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.general:general-info')}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @include('pages.accounts.partials.show_map')
        <hr>
        @include('pages.accounts.partials.show_notes')
    </div>
</div>
