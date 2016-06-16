<table class="table table-responsive" id="estimates-table">
    <thead>
        <th>{{trans('app.general:topic')}}</th>
        <th>{{trans('app.contact:account-name')}}</th>
        <th>{{trans('app.general:phase')}}</th>
        <th>{{trans('app.contact:name')}}</th>
        <th>{{trans('app.general:deadline')}}</th>
        <th>{{trans('app.contact:owner')}}</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($estimates as $estimate)
        <tr>
            <td>{!! $estimate->topic !!}</td>
            <td>{!! $estimate->account_name !!}</td>
            <td>{!! $estimate->phase !!}</td>
            <td>{!! $estimate->contact_name !!}</td>
            <td>{!! $estimate->deadline !!}</td>
            <td>{!! $estimate->contact_owner !!}</td>
            <td>
                {!! Form::open(['route' => ['estimates.destroy', $estimate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estimates.show', [$estimate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estimates.edit', [$estimate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>