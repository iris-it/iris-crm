<table class="table table-striped table-responsive" id="orders-table">
    <thead>
        <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
        <th class="h4 text-purple text-uppercase">{{ trans('app.order:supplier') }}</th>
        <th class="h4 text-purple text-uppercase">{{ trans('app.order:order-date') }}</th>
        <th class="h4 text-purple text-uppercase">{{ trans('app.order:deli-dead') }}</th>
        <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td class="text-bold">{!! $order->topic !!}</td>
            <td class="text-bold">{!! $order->supplier !!}</td>
            <td class="text-bold">{!! $order->order_date !!}</td>
            <td class="text-bold">{!! $order->delivery_deadline !!}</td>
            <td class="text-bold">
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn bg-purple btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>