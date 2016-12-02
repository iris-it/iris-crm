<a class="btn bg-blue btn-flat pull-right" style="margin:5px 5px 10px 0px" href="{{action('ContactController@create', ["account_id" => $account->id, "office_id" => $office->id])}}">
    <i class="fa fa-address-card"></i> {{trans('app.contact:contact-add')}}
</a>

@if($office->contacts->count() > 0)
    <table class="table table-striped">
        <tbody>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Actions</th>
        </tr>
        @foreach($office->contacts as $contact)
            <tr>
                <td>{{$contact->lastname}}</td>
                <td>{{$contact->firstname}}</td>
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

