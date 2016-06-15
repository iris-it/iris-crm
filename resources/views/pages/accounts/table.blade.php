<table class="table table-responsive" id="accounts-table">
    <thead>
        <th>Account Name</th>
        <th>Website</th>
        <th>Activity Sector</th>
        <th>Workforce</th>
        <th>Type</th>
        <th>Ape Number</th>
        <th>Siret Number</th>
        <th>Phone Number</th>
        <th>Is Active</th>
        <th>Account Owner</th>
        <th>Billing Address</th>
        <th>Delivery Address</th>
        <th>Billing Zipcode</th>
        <th>Delivery Zipcode</th>
        <th>Billing City</th>
        <th>Delivery City</th>
        <th>Billing Country</th>
        <th>Delivery Country</th>
        <th>Free Label</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($accounts as $account)
        <tr>
            <td>{!! $account->account_name !!}</td>
            <td>{!! $account->website !!}</td>
            <td>{!! $account->activity_sector !!}</td>
            <td>{!! $account->workforce !!}</td>
            <td>{!! $account->type !!}</td>
            <td>{!! $account->ape_number !!}</td>
            <td>{!! $account->siret_number !!}</td>
            <td>{!! $account->phone_number !!}</td>
            <td>{!! $account->is_active !!}</td>
            <td>{!! $account->account_owner !!}</td>
            <td>{!! $account->billing_address !!}</td>
            <td>{!! $account->delivery_address !!}</td>
            <td>{!! $account->billing_zipcode !!}</td>
            <td>{!! $account->delivery_zipcode !!}</td>
            <td>{!! $account->billing_city !!}</td>
            <td>{!! $account->delivery_city !!}</td>
            <td>{!! $account->billing_country !!}</td>
            <td>{!! $account->delivery_country !!}</td>
            <td>{!! $account->free_label !!}</td>
            <td>
                {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accounts.show', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>