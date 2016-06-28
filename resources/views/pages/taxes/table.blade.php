<table class="table table-responsive" id="quotes-table">
    <thead>
    <th>{{trans('app.general:name')}}</th>
    <th>{{trans('app.general:value')}}</th>
    <th>{{trans('app.general:is-active')}}</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($taxes as $tax)
        <tr>
            <td>{!! $tax->name !!}</td>
            <td>{!! $tax->value !!} %</td>
            @if($tax->is_active)
                <td>{{trans('app.general:yes')}}</td>
            @else
                <td>{{trans('app.general:no')}}</td>
            @endif
            <td>
                {!! Form::open(['route' => ['taxes.destroy', $tax->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('taxes.show', [$tax->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('taxes.edit', [$tax->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>