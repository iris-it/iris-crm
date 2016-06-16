<table class="table table-responsive" id="products-table">
    <thead>
        <th>{{trans('app.general:name')}}</th>
        <th>{{trans('app.product:category')}}</th>
        <th>{{ trans('app.product:ht-price') }}</th>
        <th>{{ trans('app.product:manu-officer') }}</th>
        <th>{{ trans('app.product:stock-dispo') }}</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $products)
        <tr>
            <td>{!! $products->product_name !!}</td>
            <td>{!! $products->category !!}</td>
            <td>{!! $products->ht_price !!}</td>
            <td>{!! $products->manutention_officer !!}</td>
            <td>{!! $products->stock_disponibility !!}</td>

            <td>
                {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>