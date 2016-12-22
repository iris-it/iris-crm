<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive center-block" src="{{asset($product->product_avatar)}}" width="150">

        <h3 class="profile-username text-center">{{$product->product_name}}
            <a href="{!! action('ProductController@edit', $product->id) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.product:ttc-price')}} : </b> <span>{{$product->ttc_price}} €</span>
            </li>
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.product:stock-dispo')}} : </b> <span>{{$product->stock_disponibility}} </span>
            </li>
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.product:category')}} : </b> <span>{!! $product->category !!}</span>
            </li>
        </ul>
    </div>
</div>

