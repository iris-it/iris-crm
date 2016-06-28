<table class="table table-responsive" id="services-table">
    <thead>
    <th>{{trans('app.general:name')}}</th>
    <th>{{trans('app.general:is-active')}}</th>
    <th>{{trans('app.product:category')}}</th>

    <th>{{trans('app.product:ht-price')}}</th>

    <th>{{trans('app.product:date-start')}}</th>
    <th>{{trans('app.product:date-end')}}</th>

    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! $service->service_name !!}</td>
            @if($service->is_active == true)
                <td>{{trans('app.general:yes')}}</td>
            @else
                <td>{{trans('app.general:no')}}</td>
            @endif
            <td>{!! $service->category !!}</td>

            <td>{!! $service->ht_price !!}</td>
            <td>{!! $service->sale_datestart !!}</td>
            <td>{!! $service->sale_dateend !!}</td>
            <td>
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('services.show', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>