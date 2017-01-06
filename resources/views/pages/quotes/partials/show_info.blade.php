<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center">{{$quote->topic . " : " . $quote->phase}}
            <a href="{!! action('QuoteController@edit', $quote->id) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>{{trans('app.contact:office')}} : </b> <span>{{$quote->office->name}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.contact:account')}} : </b> <a href="{!! action('AccountController@show', [$quote->office->account->id]) !!}">{{$quote->office->account->name}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:created-at')}} : </b> <span>{{$quote->created_at}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:updated-at')}} : </b> <span>{{$quote->updated_at}}</span>
            </li>
        </ul>

        <a href="{{action('ReceiptController@store', $quote->id)}}" class="btn btn-app bg-blue btn-flat pull-right btn-create" data-method="POST" data-token="{{csrf_token()}}">
            <i class="fa fa-files-o"></i> {{trans('app.receipt:generate')}}
        </a>


    </div>
</div>

