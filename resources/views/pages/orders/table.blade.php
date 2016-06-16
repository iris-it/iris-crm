<table class="table table-responsive" id="orders-table">
    <thead>
        <th>{{trans('app.general:topic')}}</th>
        <th>{{ trans('app.order:supplier') }}</th>
        <th>{{ trans('app.order:order-date') }}</th>
        <th>{{ trans('app.order:deli-dead') }}</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->topic !!}</td>
            <td>{!! $order->supplier !!}</td>
            <td>{!! $order->order_date !!}</td>
            <td>{!! $order->delivery_deadline !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>