<table class="table table-responsive" id="products-table">
    <thead>
        <th>Product Name</th>
        <th>Is Active</th>
        <th>Category</th>
        <th>Ht Price</th>
        <th>Ttc Price</th>
        <th>Manutention Officer</th>
        <th>Stock Disponibility</th>
        <th>Product Avatar</th>
        <th>Sale Datestart</th>
        <th>Sale Dateend</th>
        <th>Product Notice</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $products)
        <tr>
            <td>{!! $products->product_name !!}</td>
            <td>{!! $products->is_active !!}</td>
            <td>{!! $products->category !!}</td>
            <td>{!! $products->ht_price !!}</td>
            <td>{!! $products->ttc_price !!}</td>
            <td>{!! $products->manutention_officer !!}</td>
            <td>{!! $products->stock_disponibility !!}</td>
            <td>{!! $products->product_avatar !!}</td>
            <td>{!! $products->sale_datestart !!}</td>
            <td>{!! $products->sale_dateend !!}</td>
            <td>{!! $products->product_notice !!}</td>
            <td>{!! $products->description !!}</td>
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