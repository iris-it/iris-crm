<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center">{{$invoice->topic . " : " . $invoice->phase}}
            <a href="{!! action('InvoiceController@edit', $invoice->id) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>{{trans('app.contact:office')}} : </b> <span>{{$invoice->office->name}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.contact:account')}} : </b> <a href="{!! action('AccountController@show', [$invoice->office->account->id]) !!}">{{$invoice->office->account->name}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:created-at')}} : </b> <span>{{$invoice->created_at}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:updated-at')}} : </b> <span>{{$invoice->updated_at}}</span>
            </li>
        </ul>
    </div>
</div>

