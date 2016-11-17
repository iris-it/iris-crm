<table class="table table-striped table-responsive" id="quotes-table">
    <thead>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:account-name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:phase')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:name')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:ht-price')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:ttc-price')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.general:deadline')}}</th>
    <th class="h4 text-purple text-uppercase">{{trans('app.contact:owner')}}</th>
    <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($quotes as $quote)
        <tr>
            <td class="text-bold">{!! $quote->topic !!}</td>
            @if($quote->account)
                <td class="text-bold">{!! $quote->account->name !!}</td>
            @else
                <td class="text-bold"> {{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold">{!! $quote->phase !!}</td>
            @if($quote->contact)
                <td class="text-bold">{!! $quote->contact->firstname !!} {!! $quote->contact->lastname !!}</td>
            @else
                <td class="text-bold"> {{trans('app.general:undefined')}}</td>
            @endif
            <td class="text-bold"> {!! $quote->ht_price !!} €</td>
            <td class="text-bold"> {!! $quote->ttc_price !!} €</td>
            <td class="text-bold">{!! $quote->deadline !!}</td>
            @if($quote->user)
                <td class="text-bold">{!! $quote->user->name !!}</td>
            @else
                <td class="text-bold"> {{trans('app.general:undefined')}}</td>
            @endif
            <td>
                {!! Form::open(['action' => ['QuoteController@destroy', $quote->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! action('QuoteController@show', [$quote->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! action('QuoteController@edit', [$quote->id]) !!}" class='btn bg-purple btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
