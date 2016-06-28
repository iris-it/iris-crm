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
    @foreach($products as $product)
        <tr>
            <td>{!! $product->product_name !!}</td>
            <td>{!! $product->category !!}</td>
            <td>{!! $product->ht_price !!}</td>
            @if($product->contact)
                <td>{!! $product->contact->firstname !!} {!! $product->contact->lastname !!}</td>
            @else
                <td>{{trans('app.general:undefined')}}</td>
            @endif
            <td>{!! $product->stock_disponibility !!}</td>

            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>