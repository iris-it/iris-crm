
@foreach($accounts as $account)
    @if($account->quotes->count() > 0)
        <div class="box box-primary">
            <div class="box-body">
                <h4 class="box-title">{{trans('app.receipt:list-by-account')}} {{$account->name}}</h4>
            </div>

            <table class="table table-striped table-responsive" id="receipts-table">
                <thead>
                <th class="h4 text-purple text-uppercase">{{trans('app.general:office')}}</th>
                <th class="h4 text-purple text-uppercase">{{trans('app.receipt:quote-topic')}}</th>
                <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
                <th class="h4 text-purple text-uppercase">{{trans('app.receipt:supplier')}}</th>
                <th class="h4 text-purple text-uppercase">{{trans('app.receipt:order-date')}}</th>
                <th class="h4 text-purple text-uppercase">{{trans('app.receipt:deli-dead')}}</th>

                <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
                </thead>
                <tbody>
                @foreach($account->quotes as $quote)
                    @if($quote->receipt)
                        <tr>
                            <td class="text-bold">{!! $quote->office->name !!}</td>
                            <td class="text-bold">{!! $quote->topic !!}</td>
                            <td class="text-bold">{!! $quote->receipt->topic !!}</td>
                            <td class="text-bold">{!! $quote->receipt->supplier !!}</td>
                            <td class="text-bold">{!! $quote->receipt->order_date !!}</td>
                            <td class="text-bold"> {!! $quote->receipt->delivery_deadline !!} €</td>
                            <td>
                                {!! Form::open(['action' => ['InvoiceController@destroy', $invoice->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! action('ReceiptController@show', [$quote->receipt->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! action('InvoiceController@edit', [$quote->receipt->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endforeach