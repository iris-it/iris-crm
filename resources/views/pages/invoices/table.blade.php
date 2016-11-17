<table class="table table-striped table-responsive" id="invoices-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:account-name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:phase')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:ht-price')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:ttc-price')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:deadline')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:quote')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td class="text-bold">{!! $invoice->topic !!}</td>
            @if($invoice->account)
                <td class="text-bold">{!! $invoice->account->name !!}</td>
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold">{!! $invoice->phase !!}</td>
            @if($invoice->contact)
                <td class="text-bold">{!! $invoice->contact->name !!}</td>
            @else
                <td class="text-bold">{{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold"> {!! $invoice->ht_price !!} €</td>
            <td class="text-bold"> {!! $invoice->ttc_price !!} €</td>
            <td class="text-bold">{!! $invoice->deadline !!}</td>
            @if($invoice->quote)
                <td class="text-bold"> {!! $invoice->quote->name !!}</td>
            @else
                <td class="text-bold"> {{trans('app.general:undefined')}}</td>
            @endif
            <td>
                {!! Form::open(['action' => ['InvoiceController@destroy', $invoice->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('InvoiceController@show', [$invoice->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('InvoiceController@edit', [$invoice->id]) !!}" class='btn bg-purple btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
