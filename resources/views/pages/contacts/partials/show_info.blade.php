<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive" src="{{$contact->avatar}}">

        <h3 class="profile-username text-center">{{$contact->firstname . " " . $contact->lastname}}
            <a href="{!! action('ContactController@edit', $contact->id) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>{{trans('app.contact:office')}} : </b> <span>{{$contact->office->name}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.contact:account')}} : </b> <a href="{!! action('AccountController@show', [$contact->office->account->id]) !!}">{{$contact->office->account->name}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:created-at')}} : </b> <span>{{$contact->created_at}}</span>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:updated-at')}} : </b> <span>{{$contact->updated_at}}</span>
            </li>
        </ul>
    </div>
</div>

