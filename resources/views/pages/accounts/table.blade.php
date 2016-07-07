<table class="table table-responsive" id="accounts-table">
    <thead>
    <th>{{trans('app.general:name')}}</th>
    <th>{{trans('app.general:workforce')}}</th>
    <th>{{trans('app.general:type')}}</th>
    <th>{{trans('app.general:account-owner')}}</th>
    <th>{{trans('app.account:converted')}}</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($accounts as $account)
        <tr>
            <td>{!! $account->name !!}</td>
            <td>{!! $account->workforce !!}</td>
            <td>{!! $account->type !!}</td>
            <td>
                @if($account->user)
                    {!! $account->user->name !!}
                @else
                    {{trans('app.general:undefined')}}
                @endif
            </td>
            <td>
                @if($account->converted)
                    {{trans('app.general:yes')}}
                @else
                    {{trans('app.general:no')}}
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accounts.show', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>