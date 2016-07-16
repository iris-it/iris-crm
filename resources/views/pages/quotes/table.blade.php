<table class="table table-responsive" id="quotes-table">
    <thead>
    <th>{{trans('app.general:topic')}}</th>
    <th>{{trans('app.contact:account-name')}}</th>
    <th>{{trans('app.general:phase')}}</th>
    <th>{{trans('app.contact:name')}}</th>
    <th>{{trans('app.general:ht-price')}}</th>
    <th>{{trans('app.general:ttc-price')}}</th>
    <th>{{trans('app.general:deadline')}}</th>
    <th>{{trans('app.contact:owner')}}</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($quotes as $quote)
        <tr>
            <td>{!! $quote->topic !!}</td>
            @if($quote->account)
                <td>{!! $quote->account->name !!}</td>
            @else
                <td> {{trans('app.general:undefined')}}</td>
            @endif
            <td>{!! $quote->phase !!}</td>
            @if($quote->contact)
                <td>{!! $quote->contact->firstname !!} {!! $quote->contact->lastname !!}</td>
            @else
                <td> {{trans('app.general:undefined')}}</td>
            @endif
            <td> {!! $quote->ht_price !!} €</td>
            <td> {!! $quote->ttc_price !!} €</td>
            <td>{!! $quote->deadline !!}</td>
            @if($quote->user)
                <td>{!! $quote->user->name !!}</td>
            @else
                <td> {{trans('app.general:undefined')}}</td>
            @endif
            <td>
                {!! Form::open(['route' => ['quotes.destroy', $quote->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('quotes.show', [$quote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('quotes.edit', [$quote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>