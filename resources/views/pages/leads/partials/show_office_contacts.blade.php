<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title pull-left">{{trans('app.general:contacts')}}</h4>
        <a class="btn bg-blue btn-flat pull-right" href="{{action('ContactController@create', ["account_id" => $lead->id, "office_id" => $office->id])}}">
            <i class="fa fa-address-card" style="margin-right:5px"> </i> {{trans('app.contact:office-add')}}
        </a>
        <br>
        <hr>

        @if($office->contacts->count() > 0)

            <table class="table table-striped">
                <tbody>
                <tr>
                    <th class="h4">{{trans('app.general:name')}}</th>
                    <th class="h4">{{trans('app.contact:post')}}</th>
                    <th class="h4">{{trans('app.contact:email')}}</th>
                    <th class="h4">{{trans('app.contact:phone')}}</th>
                    <th>Actions</th>
                </tr>
                @foreach($office->contacts as $contact)
                    <tr>
                        <td>{{$contact->firstname}} {{$contact->lastname}}</td>
                        <td>{!! $contact->post !!}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td>
                            <div class='btn-group'>
                                <a href="{!! action('ContactController@show', [$contact->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>
