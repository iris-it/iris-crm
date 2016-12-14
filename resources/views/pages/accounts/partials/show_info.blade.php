<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive center-block" src="{{asset($account->logo)}}" width="150">
        <!-- //TODO Default image -->

        <h3 class="profile-username text-center">{{$account->name}}
            @if(!$account->is_lead)
                <a href="{!! action('AccountController@edit', [$account->id]) !!}" class='btn btn-flat'>
            @else
                <a href="{!! action('LeadController@edit', [$account->id]) !!}" class='btn btn-flat'>
            @endif
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
        </h3>

        @if(!$account->is_lead)
            <div class="text-muted text-center">
                <label>{{trans('app.account:converted-field')}} :</label>
                @if($account->converted)
                    <span> {!! trans('app.account:converted') !!}</span>
                @else
                    <span> {!! trans('app.account:unconverted') !!}</span>
                @endif
            </div>
        @endif

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>{{trans('app.general:offices')}}</b> <a class="pull-right">{{$account->offices->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:contacts')}}</b> <a class="pull-right">{{$account->contacts()->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:quotes')}}</b> <a class="pull-right">{{$account->quotes()->count()}}</a>
            </li>
            @if(!$account->is_lead)
                <li class="list-group-item">
                    <b>{{trans('app.general:invoices')}}</b> <a class="pull-right">{{$account->invoices()->count()}}</a>
                </li>
            @endif
        </ul>
    </div>
</div>

