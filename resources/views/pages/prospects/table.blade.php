<table class="table table-responsive" id="prospects-table">
    <thead>
        <th>{{trans('app.general:name')}}</th>

        <th>{{trans('app.general:activity-sector')}}</th>

        <th>{{trans('app.general:type')}}</th>

        <th>{{trans('app.general:status')}}</th>
        <th>{{trans('app.general:account-owner')}}r</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($prospects as $prospect)
        <tr>
            <td>{!! $prospect->prospect_name !!}</td>
            <td>{!! $prospect->activity_sector !!}</td>
            <td>{!! $prospect->type !!}</td>
            <td>{!! $prospect->status !!}</td>
            <td>{!! $prospect->account_owner !!}</td>

            <td>
                {!! Form::open(['route' => ['prospects.destroy', $prospect->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('prospects.show', [$prospect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('prospects.edit', [$prospect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>