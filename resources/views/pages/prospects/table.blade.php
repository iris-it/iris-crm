<table class="table table-responsive" id="prospects-table">
    <thead>
        <th>Prospect Name</th>
        <th>Website</th>
        <th>Activity Sector</th>
        <th>Workforce</th>
        <th>Type</th>
        <th>Ape Number</th>
        <th>Siret Number</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Account Owner</th>
        <th>Address</th>
        <th>Zipcode</th>
        <th>City</th>
        <th>Country</th>
        <th>Free Label</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($prospects as $prospect)
        <tr>
            <td>{!! $prospect->prospect_name !!}</td>
            <td>{!! $prospect->website !!}</td>
            <td>{!! $prospect->activity_sector !!}</td>
            <td>{!! $prospect->workforce !!}</td>
            <td>{!! $prospect->type !!}</td>
            <td>{!! $prospect->ape_number !!}</td>
            <td>{!! $prospect->siret_number !!}</td>
            <td>{!! $prospect->phone_number !!}</td>
            <td>{!! $prospect->status !!}</td>
            <td>{!! $prospect->account_owner !!}</td>
            <td>{!! $prospect->address !!}</td>
            <td>{!! $prospect->zipcode !!}</td>
            <td>{!! $prospect->city !!}</td>
            <td>{!! $prospect->country !!}</td>
            <td>{!! $prospect->free_label !!}</td>
            <td>
                {!! Form::open(['route' => ['prospects.destroy', $prospect->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('prospects.show', [$prospect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('prospects.edit', [$prospect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>