<table class="table table-responsive" id="estimates-table">
    <thead>
        <th>Topic</th>
        <th>Account Name</th>
        <th>Phase</th>
        <th>Contact Name</th>
        <th>Deadline</th>
        <th>Contact Owner</th>
        <th>Description</th>
        <th>Special Conditions</th>
        <th>Address</th>
        <th>Zipcode</th>
        <th>City</th>
        <th>Country</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($estimates as $estimate)
        <tr>
            <td>{!! $estimate->topic !!}</td>
            <td>{!! $estimate->account_name !!}</td>
            <td>{!! $estimate->phase !!}</td>
            <td>{!! $estimate->contact_name !!}</td>
            <td>{!! $estimate->deadline !!}</td>
            <td>{!! $estimate->contact_owner !!}</td>
            <td>{!! $estimate->description !!}</td>
            <td>{!! $estimate->special_conditions !!}</td>
            <td>{!! $estimate->address !!}</td>
            <td>{!! $estimate->zipcode !!}</td>
            <td>{!! $estimate->city !!}</td>
            <td>{!! $estimate->country !!}</td>
            <td>
                {!! Form::open(['route' => ['estimates.destroy', $estimate->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estimates.show', [$estimate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estimates.edit', [$estimate->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>