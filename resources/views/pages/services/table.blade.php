<table class="table table-responsive" id="services-table">
    <thead>
        <th>Service Name</th>
        <th>Is Active</th>
        <th>Category</th>
        <th>Sale Unit</th>
        <th>Ht Price</th>
        <th>Ttc Price</th>
        <th>Sale Datestart</th>
        <th>Sale Dateend</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! $service->service_name !!}</td>
            <td>{!! $service->is_active !!}</td>
            <td>{!! $service->category !!}</td>
            <td>{!! $service->sale_unit !!}</td>
            <td>{!! $service->ht_price !!}</td>
            <td>{!! $service->ttc_price !!}</td>
            <td>{!! $service->sale_datestart !!}</td>
            <td>{!! $service->sale_dateend !!}</td>
            <td>{!! $service->description !!}</td>
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