<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="img-responsive center-block" src="{{asset($lead->logo)}}" width="150">
        <!-- //TODO Default image -->

        <h3 class="profile-username text-center">{{$lead->name}}
            <a href="{!! action('LeadController@edit', [$lead->id]) !!}" class='btn btn-flat'>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        </h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>{{trans('app.general:offices')}}</b> <a class="pull-right">{{$lead->offices->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:contacts')}}</b> <a class="pull-right">{{$lead->contacts()->count()}}</a>
            </li>
            <li class="list-group-item">
                <b>{{trans('app.general:quotes')}}</b> <a class="pull-right">{{$lead->quotes()->count()}}</a>
            </li>
        </ul>
    </div>
</div>

