<table class="table table-responsive" id="leads-table">
    <thead>
        <th>{{trans('app.general:name')}}</th>

        <th>{{trans('app.general:activity-sector')}}</th>

        <th>{{trans('app.general:type')}}</th>

        <th>{{trans('app.general:status')}}</th>
        <th>{{trans('app.general:account-owner')}}r</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td>{!! $lead->name !!}</td>
            <td>{!! $lead->activity_sector !!}</td>
            <td>{!! $lead->type !!}</td>
            <td>{!! $lead->status !!}</td>
            @if($lead->user)
                <td>{!! $lead->user->name !!}</td>
            @else
                <td>{{trans('app.general:undefined')}}</td>
            @endif

            <td>
                {!! Form::open(['route' => ['leads.destroy', $lead->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('leads.show', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('leads.edit', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>