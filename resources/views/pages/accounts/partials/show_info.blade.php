<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive" src="{{$account->name}}">

        <h3 class="profile-username text-center">{{$account->name}}
            <a href="{!! action('AccountController@edit', [$account->id]) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <div class="text-muted text-center">
            <label>{{trans('app.account:converted-field')}} :</label>
            @if($account->converted)
                <span> {!! trans('app.account:converted') !!}</span>
            @else
                <span> {!! trans('app.account:unconverted') !!}</span>
            @endif
        </div>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Bureaux</b> <a class="pull-right">{{$account->offices->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>Contacts</b> <a class="pull-right">{{$account->contacts()->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>Devis</b> <a class="pull-right">{{$account->quotes()->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>Factures</b> <a class="pull-right">{{$account->invoices()->count()}}</a>
            </li>
        </ul>
    </div>
</div>

