<table class="table table-responsive" id="invoices-table">
    <thead>
        <th>{{trans('app.general:topic')}}</th>
        <th>{{trans('app.contact:account-name')}}</th>
        <th>{{trans('app.general:phase')}}</th>
        <th>{{trans('app.contact:name')}}</th>
        <th>{{trans('app.general:deadline')}}</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{!! $invoice->topic !!}</td>
            <td>{!! $invoice->account_name !!}</td>
            <td>{!! $invoice->phase !!}</td>
            <td>{!! $invoice->contact_name !!}</td>
            <td>{!! $invoice->deadline !!}</td>
            <td>
                {!! Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('invoices.show', [$invoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('invoices.edit', [$invoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>