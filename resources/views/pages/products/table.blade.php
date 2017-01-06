<table class="table table-striped table-responsive" id="products-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.product:category')}}</th>
    <th class="h4 text-purple text-uppercase">{{ trans('app.product:ht-price') }}</th>
    <th class="h4 text-purple text-uppercase">{{ trans('app.general:ttc-price') }}</th>
    <th class="h4 text-purple text-uppercase">{{ trans('app.product:manu-officer') }}</th>
    <th class="h4 text-purple text-uppercase">{{ trans('app.product:stock-dispo') }}</th>

    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td class="text-bold">{!! $product->product_name !!}</td>
            <td class="text-bold">{!! $product->category !!}</td>
            <td class="text-bold">{!! $product->ht_price !!}</td>
            <td class="text-bold">{!! $product->ttc_price !!}</td>
            @if($product->contact)
                <td class="text-bold">{!! $product->contact->firstname !!} {!! $product->contact->lastname !!}</td>
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold">{!! $product->stock_disponibility !!}</td>

            <td>
                {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('ProductController@show', [$product->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('ProductController@edit', [$product->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
