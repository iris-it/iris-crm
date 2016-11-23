<table class="table table-striped table-responsive" id="quotes-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:value')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:is-active')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($taxes as $tax)
        <tr>
            <td class="text-bold">{!! $tax->name !!}</td>
            <td class="text-bold">{!! $tax->value !!} %</td>
            @if($tax->is_active)
                <td class="text-bold">{{trans('app.general:yes')}}</td>
            @else
                <td class="text-bold">{{trans('app.general:no')}}</td>
            @endif
            <td>
                {!! Form::open(['action' => ['TaxController@destroy', $tax->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('TaxController@show', [$tax->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('TaxController@edit', [$tax->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
