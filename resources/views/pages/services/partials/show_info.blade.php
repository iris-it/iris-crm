<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive center-block" src="{{asset($service->service_avatar)}}" width="150">

        <h3 class="profile-username text-center">{{$service->name}}
            <a href="{!! action('ServiceController@edit', $service->id) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.product:ttc-price')}} : </b> <span>{{$service->ttc_price}} €</span>
            </li>
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.service:sale-unit')}} : </b> <span>{{$service->sale_unit}} </span>
            </li>
            <li class="list-group-item h4 text-bold">
                <b class="text-purple">{{trans('app.product:category')}} : </b> <span>{!! $service->category !!}</span>
            </li>
        </ul>
    </div>
</div>

