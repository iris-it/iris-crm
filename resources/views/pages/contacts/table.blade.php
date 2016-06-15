<table class="table table-responsive" id="contacts-table">
    <thead>
        <th>Civility</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Post</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Account Name</th>
        <th>Contact Owner</th>
        <th>Avatar</th>
        <th>Address</th>
        <th>Zipcode</th>
        <th>City</th>
        <th>Country</th>
        <th>Free Label</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->civility !!}</td>
            <td>{!! $contact->lastname !!}</td>
            <td>{!! $contact->firstname !!}</td>
            <td>{!! $contact->post !!}</td>
            <td>{!! $contact->email !!}</td>
            <td>{!! $contact->phone_number !!}</td>
            <td>{!! $contact->account_name !!}</td>
            <td>{!! $contact->contact_owner !!}</td>
            <td>{!! $contact->avatar !!}</td>
            <td>{!! $contact->address !!}</td>
            <td>{!! $contact->zipcode !!}</td>
            <td>{!! $contact->city !!}</td>
            <td>{!! $contact->country !!}</td>
            <td>{!! $contact->free_label !!}</td>
            <td>
                {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>