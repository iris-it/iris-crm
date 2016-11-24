<table class="table table-striped table-responsive" id="leads-table">
    <thead>
        <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>

        <th class="h4 text-purple text-uppercase">{{trans('app.general:activity-sector')}}</th>

        <th class="h4 text-purple text-uppercase">{{trans('app.general:type')}}</th>

        <th class="h4 text-purple text-uppercase">{{trans('app.general:status')}}</th>
        <th class="h4 text-purple text-uppercase">{{trans('app.general:account-owner')}}</th>

        <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td class="text-bold">{!! $lead->name !!}</td>
            <td class="text-bold">{!! $lead->activity_sector !!}</td>
            <td class="text-bold">{!! $lead->type !!}</td>
            <td class="text-bold">{!! $lead->status !!}</td>
            @if($lead->user)
                <td class="text-bold">{!! $lead->user->name !!}</td>
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif

            <td>
                {!! Form::open(['action' => ['LeadController@destroy', $lead->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('LeadController@show', [$lead->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('LeadController@edit', [$lead->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
