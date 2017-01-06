<table class="table table-striped table-responsive" id="accounts-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:workforce')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:type')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:account-owner')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.account:converted')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($accounts as $account)
        <tr>
            <td class="text-bold">{!! $account->name !!}</td>
            <td class="text-bold">{!! $account->workforce !!}</td>
            <td class="text-bold">{!! $account->type !!}</td>
            <td class="text-bold">
                @if($account->user)
                    {!! $account->user->name !!}
                @else
                    {{trans('app.general:undefined')}}
                @endif
            </td>
            <td class="text-bold">
                @if($account->converted)
                    {{trans('app.general:yes')}}
                @else
                    {{trans('app.general:no')}}
                @endif
            </td>
            <td>
                {!! Form::open(['action' => ['AccountController@destroy', $account->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('AccountController@show', [$account->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('AccountController@edit', [$account->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
