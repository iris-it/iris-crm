<table class="table table-striped table-responsive" id="services-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:is-active')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.product:category')}}</th>

    <th class="h4 text-purple text-uppercase">{{trans('app.product:ht-price')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:ttc-price')}}</th>

    <th class="h4 text-purple text-uppercase">{{trans('app.product:date-start')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.product:date-end')}}</th>

    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td class="text-bold">{!! $service->service_name !!}</td>
            @if($service->is_active == true)
                <td class="text-bold">{{trans('app.general:yes')}}</td>
            @else
                <td class="text-bold">{{trans('app.general:no')}}</td>
            @endif
            <td class="text-bold">{!! $service->category !!}</td>

            <td class="text-bold">{!! $service->ht_price !!}</td>
            <td class="text-bold"> {!! $service->ttc_price !!}</td>
            <td class="text-bold">{!! $service->sale_datestart !!}</td>
            <td class="text-bold">{!! $service->sale_dateend !!}</td>
            <td>
                {!! Form::open(['action' => ['ServiceController@destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('ServiceController@show', [$service->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('ServiceController@edit', [$service->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
