@foreach($accounts as $account)
    <div class="box box-primary">
        <div class="box-body">
            <h4 class="box-title">{{trans('app.quote:list-by-account')}} {{$account->name}}</h4>
        </div>

        <table class="table table-striped table-responsive" id="quotes-table">
            <thead>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:office')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:phase')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:deadline')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:ht-price')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:ttc-price')}}</th>

            <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
            </thead>
            <tbody>
            @foreach($account->quotes as $quote)
                <tr>
                    <td class="text-bold">{!! $quote->office->name !!}</td>
                    <td class="text-bold">{!! $quote->topic !!}</td>
                    <td class="text-bold">{!! $quote->phase !!}</td>
                    <td class="text-bold">{!! $quote->deadline !!}</td>
                    <td class="text-bold"> {!! $quote->ht_price !!} €</td>
                    <td class="text-bold"> {!! $quote->ttc_price !!} €</td>

                    @if($quote->user)
                        <td class="text-bold">{!! $quote->user->name !!}</td>
                    @else
                        <td class="text-bold"> {{trans('app.general:undefined')}}</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['QuoteController@destroy', $quote->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! action('QuoteController@show', [$quote->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! action('QuoteController@edit', [$quote->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endforeach

@foreach($leads as $lead)
    <div class="box box-primary">
        <div class="box-body">
            <h4 class="box-title">{{trans('app.quote:list-by-lead')}} {{$lead->name}}</h4>
        </div>

        <table class="table table-striped table-responsive" id="quotes-table">
            <thead>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:office')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:topic')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:phase')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:deadline')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:ht-price')}}</th>
            <th class="h4 text-purple text-uppercase">{{trans('app.general:ttc-price')}}</th>

            <th class="h4 text-purple text-uppercase" colspan="3">Action</th>
            </thead>
            <tbody>
            @foreach($lead->quotes as $quote)
                <tr>
                    <td class="text-bold">{!! $quote->office->name !!}</td>
                    <td class="text-bold">{!! $quote->topic !!}</td>
                    <td class="text-bold">{!! $quote->phase !!}</td>
                    <td class="text-bold">{!! $quote->deadline !!}</td>
                    <td class="text-bold"> {!! $quote->ht_price !!} €</td>
                    <td class="text-bold"> {!! $quote->ttc_price !!} €</td>

                    @if($quote->user)
                        <td class="text-bold">{!! $quote->user->name !!}</td>
                    @else
                        <td class="text-bold"> {{trans('app.general:undefined')}}</td>
                    @endif
                    <td>
                        {!! Form::open(['action' => ['QuoteController@destroy', $quote->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! action('QuoteController@show', [$quote->id]) !!}" class='btn btn-info btn-flat'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! action('QuoteController@edit', [$quote->id]) !!}" class='btn bg-blue btn-flat'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-flat', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endforeach



